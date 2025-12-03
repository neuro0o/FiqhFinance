<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleAttempt;
use App\Models\BestScore;
use App\Models\Badge;

class Module4QuizController extends Controller
{
    /*----------------- MODULE 4 QUESTIONS -------------------*/
    private $questions = [
        [
            'text' => "Takaful is based on donation and cooperation",
            'answer' => "true",
            'correct_msg' => "Right! Teamwork makes the dream work",
            'wrong_msg' => "Oops! Takaful = helping each other, not solo moves!"
        ],
        [
            'text' => "Conventional insurance transfers risk entirely to the company",
            'answer' => "true",
            'correct_msg' => "Yes! You pay, they risk it all",
            'wrong_msg' => "Nah! Conventional insurance puts risk mostly on the company, not shared"
        ],
        [
            'text' => "In Takaful, surplus is always guaranteed to be returned to participants",
            'answer' => "false",
            'correct_msg' => "Bingo! Surplus may or may not come back",
            'wrong_msg' => "Not quite! Surplus isn't always guaranteed"
        ],
        [
            'text' => "Takaful funds must be invested in Halal industries",
            'answer' => "true",
            'correct_msg' => "Correct! No Haram cash here",
            'wrong_msg' => "Nope! Investment must stay Halal!"
        ],
        [
            'text' => "Takaful operators manage the fund and pay claims",
            'answer' => "true",
            'correct_msg' => "Spot on! They're like fund superheroes!",
            'wrong_msg' => "Wrong! Operators handle the fund and claims"
        ],
        [
            'text' => "Participants in Takaful do not share risk",
            'answer' => "false",
            'correct_msg' => "Yes! Everyone shares the risk. Manifesting teamwork vibes only here",
            'wrong_msg' => "Oops! Participants DO share risks"
        ],
        [
            'text' => "Takaful follows the concept of Tabarru'",
            'answer' => "true",
            'correct_msg' => "Right! Tabarru' = donation spirit",
            'wrong_msg' => "Nah! Takaful is all about helping each other"
        ],
        [
            'text' => "General Takaful covers life protection",
            'answer' => "false",
            'correct_msg' => "Correct! Life protection is for Family Takaful only",
            'wrong_msg' => "Wrong! General Takaful ≠ Life Protection"
        ],
        [
            'text' => "Takaful investments can include alcohol and gambling companies",
            'answer' => "false",
            'correct_msg' => "Yes! Only Halal investments allowed here",
            'wrong_msg' => "Nope! Haram companies? Not in Takaful my dear, NEVER!"
        ],
        [
            'text' => "Claim process in Takaful can sometimes be slower",
            'answer' => "true",
            'correct_msg' => "Yep! Patience is a virtue",
            'wrong_msg' => "Nope! You need to wait a little bit longer my dear"
        ],
    ];

    /*----------------- START QUIZ -------------------*/
    public function start()
    {
        session()->forget('module4_answers');
        return redirect()->route('module4.quiz.show', 1);
    }

    /*----------------- SHOW QUESTION -------------------*/
    public function show($index)
    {
        $total = count($this->questions);
        if ($index < 1 || $index > $total) {
            return redirect()->route('module4.quiz.finish');
        }

        return view('module4.quiz.question', [
            'question' => $this->questions[$index - 1],
            'index' => $index,
            'total' => $total
        ]);
    }

    /*----------------- SAVE ANSWER -------------------*/
    public function answer(Request $request, $index)
    {
        $answers = session('module4_answers', []);
        $answers[$index - 1] = $request->answer;
        session(['module4_answers' => $answers]);

        $question = $this->questions[$index - 1];
        $isCorrect = ($request->answer === $question['answer']);
        $nextIndex = $index + 1;
        $total = count($this->questions);

        return view('module4.quiz.feedback', [
            'isCorrect' => $isCorrect,
            'message' => $isCorrect ? $question['correct_msg'] : $question['wrong_msg'],
            'nextIndex' => $nextIndex,
            'total' => $total
        ]);
    }

    /*----------------- FINISH QUIZ -------------------*/
    public function finish()
    {
        $answers = session('module4_answers', []);
        
        if (empty($answers)) {
            return redirect()->route('module4.quiz.start');
        }

        // Calculate score
        $score = 0;
        foreach ($answers as $i => $ans) {
            if (isset($this->questions[$i]) && $this->questions[$i]['answer'] === $ans) {
                $score++;
            }
        }

        $userID = auth()->id();
        $moduleID = 4;

        try {
            // Save attempt using Eloquent
            $attempt = ModuleAttempt::create([
                'userID' => $userID,
                'moduleID' => $moduleID,
                'score' => $score,
                'attempted_at' => now()->format('Y-m-d H:i:s'), // Format explicitly
            ]);

            \Log::info('Module attempt saved:', ['id' => $attempt->attemptID]);

        } catch (\Exception $e) {
            \Log::error('Failed to save module attempt: ' . $e->getMessage());
        }

        // Update or create best score
        $bestScore = BestScore::where('userID', $userID)
            ->where('moduleID', $moduleID)
            ->first();

        $isNewBest = false;
        $bestScoreValue = $score;

        try {
            if (!$bestScore) {
                // First attempt - create best score
                BestScore::create([
                    'userID' => $userID,
                    'moduleID' => $moduleID,
                    'bestScore' => $score,
                    'scored_at' => now()->format('Y-m-d H:i:s'), // Format explicitly
                ]);
                $isNewBest = true;
            } elseif ($score > $bestScore->bestScore) {
                // New high score
                $bestScore->update([
                    'bestScore' => $score,
                    'scored_at' => now()->format('Y-m-d H:i:s'), // Format explicitly
                ]);
                $isNewBest = true;
            } else {
                // Not a new best
                $bestScoreValue = $bestScore->bestScore;
            }
        } catch (\Exception $e) {
            \Log::error('Failed to save best score: ' . $e->getMessage());
        }

        // Check for badge eligibility (7/10 or higher)
        $badge = null;
        if ($score >= 7) {
            $badgeData = Badge::where('badgeName', 'Takaful Team Player', 'images/badges/takaful_team_player.png')->first();
            
            if ($badgeData) {
                $badge = [
                    'badgeName' => $badgeData->badgeName,
                    'badgeDesc' => $badgeData->badgeDesc ?? '',
                    'badgeIcon' => $badgeData->badgeIcon ?? '',
                ];
            }
        }

        // Clear answers from session
        session()->forget('module4_answers');

        // Store result in session for score page
        $result = [
            'score' => $score,
            'total' => count($this->questions),
            'bestScore' => $bestScoreValue,
            'isNewBest' => $isNewBest,
            'badge' => $badge
        ];

        session(['module4_result' => $result]);

        \Log::info('Quiz finished, result stored in session:', $result);

        return redirect()->route('module4.score');
    }
}