<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BestScore;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $moduleID = $request->get('module', 'all');
        
        if ($moduleID === 'all') {
            // Overall leaderboard - sum of all module scores
            $leaderboard = User::select('users.*')
                ->selectRaw('SUM(best_scores.bestScore) as totalScore')
                ->selectRaw('MAX(best_scores.scored_at) as latestScoreDate')
                ->join('best_scores', 'users.userID', '=', 'best_scores.userID')
                ->groupBy('users.userID')
                ->orderByDesc('totalScore')
                ->orderBy('latestScoreDate', 'asc')
                ->get()
                ->map(function($user, $index) {
                    return [
                        'rank' => $index + 1,
                        'userID' => $user->userID,
                        'userName' => $user->userName,
                        'profileImg' => $user->profileImg,
                        'score' => $user->totalScore,
                        'maxScore' => 60, // Total of all 6 modules
                        'scored_at' => $user->latestScoreDate
                    ];
                });
        } else {
            // Specific module leaderboard
            $leaderboard = BestScore::with('user')
                ->where('moduleID', $moduleID)
                ->orderByDesc('bestScore')
                ->orderBy('scored_at', 'asc')
                ->get()
                ->map(function($score, $index) {
                    return [
                        'rank' => $index + 1,
                        'userID' => $score->user->userID,
                        'userName' => $score->user->userName,
                        'profileImg' => $score->user->profileImg,
                        'score' => $score->bestScore,
                        'maxScore' => 10,
                        'scored_at' => $score->scored_at
                    ];
                });
        }

        return view('user.leaderboard', [
            'leaderboard' => $leaderboard,
            'currentModule' => $moduleID,
            'currentUser' => auth()->user()
        ]);
    }
}