<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleAttempt;
use App\Models\BestScore;
use App\Models\Badge;
use App\Models\UserBadge;
use Carbon\Carbon;

class Module2QuizController extends Controller
{
    private $items = [
        [
            'id' => 1,
            'name' => "Makcik Saloma's Fried Rice Restaurant",
            'category' => 'halal'
        ],
        [
            'id' => 2,
            'name' => "Covid-19 Vaccine Research & Development",
            'category' => 'halal'
        ],
        [
            'id' => 3,
            'name' => "VR Smart Glasses",
            'category' => 'halal'
        ],
        [
            'id' => 4,
            'name' => "Carlsberg",
            'category' => 'haram'
        ],
        [
            'id' => 5,
            'name' => "Online Casino",
            'category' => 'haram'
        ],
        [
            'id' => 6,
            'name' => "Marlboro",
            'category' => 'haram'
        ],
        [
            'id' => 7,
            'name' => "Adult-themed gaming software",
            'category' => 'haram'
        ],
        [
            'id' => 8,
            'name' => "TV shows that glorify lying and cheating",
            'category' => 'haram'
        ],
        [
            'id' => 9,
            'name' => "Pak Mail's SPM Tuition Center",
            'category' => 'halal'
        ],
        [
            'id' => 10,
            'name' => "Nestle",
            'category' => 'halal'
        ],
    ];

    public function start()
    {
        // Clear previous session
        session()->forget('module2_answers');
        
        // Shuffle items for randomness
        $shuffledItems = collect($this->items)->shuffle()->values()->all();
        
        return view('module2.minigame', [
            'items' => $shuffledItems
        ]);
    }

    public function submit(Request $request)
    {
        $userAnswers = $request->input('answers', []);
        
        if (count($userAnswers) !== count($this->items)) {
            return redirect()->route('module2.minigame')->with('error', 'Please sort all items!');
        }

        // Calculate score (1 mark per correct placement)
        $score = 0;
        $results = [];

        foreach ($this->items as $item) {
            $userCategory = $userAnswers[$item['id']] ?? null;
            $correctCategory = $item['category'];
            $isCorrect = $userCategory === $correctCategory;
            
            if ($isCorrect) {
                $score++;
            }

            $results[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'userCategory' => $userCategory,
                'correctCategory' => $correctCategory,
                'isCorrect' => $isCorrect
            ];
        }

        $userID = auth()->id();
        $moduleID = 2;
        $totalMarks = count($this->items); // 10 total marks

        // Save attempt
        ModuleAttempt::create([
            'userID' => $userID,
            'moduleID' => $moduleID,
            'score' => $score,
            'attempted_at' => now()->format('Y-m-d H:i:s'),
        ]);

        // Update or create best score
        $bestScore = BestScore::where('userID', $userID)
            ->where('moduleID', $moduleID)
            ->first();

        $isNewBest = false;
        $bestScoreValue = $score;

        if (!$bestScore) {
            BestScore::create([
                'userID' => $userID,
                'moduleID' => $moduleID,
                'bestScore' => $score,
                'scored_at' => now()->format('Y-m-d H:i:s'),
            ]);
            $isNewBest = true;
        } elseif ($score > $bestScore->bestScore) {
            $bestScore->update([
                'bestScore' => $score,
                'scored_at' => now()->format('Y-m-d H:i:s'),
            ]);
            $isNewBest = true;
        } else {
            $bestScoreValue = $bestScore->bestScore;
        }

        // Check for badge eligibility (score >= 7/10)
        $badge = null;
        if ($score >= 7) {
            $badgeData = Badge::where('badgeName', 'Shariah Police')->first();
            
            if ($badgeData) {
                $hasBadge = UserBadge::where('userID', $userID)
                    ->where('badgeID', $badgeData->badgeID)
                    ->exists();
                
                if (!$hasBadge) {
                    UserBadge::create([
                        'userID' => $userID,
                        'badgeID' => $badgeData->badgeID,
                        'earned_at' => now()->format('Y-m-d H:i:s'),
                    ]);
                }
                
                $badge = [
                    'badgeName' => $badgeData->badgeName,
                    'badgeDesc' => $badgeData->badgeDesc,
                    'badgeIcon' => $badgeData->badgeIcon,
                ];
            }
        }

        // Store result in session
        session(['module2_result' => [
            'score' => $score,
            'total' => $totalMarks,
            'bestScore' => $bestScoreValue,
            'isNewBest' => $isNewBest,
            'badge' => $badge,
            'results' => $results
        ]]);

        return redirect()->route('module2.score');
    }

    public function score()
    {
        $result = session('module2_result');
        
        if (!$result) {
            return redirect()->route('module2.minigame');
        }

        return view('module2.score', compact('result'));
    }
}
