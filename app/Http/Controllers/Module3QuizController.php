<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleAttempt;
use App\Models\BestScore;
use App\Models\Badge;
use App\Models\UserBadge;
use Carbon\Carbon;

class Module3QuizController extends Controller
{
    private $scenarios = [
        [
            'id' => 1,
            'question' => "Ali wants a laptop. The bank buys it first, then sells to him with profit he agrees on. No interest.",
            'answer' => 'Murabahah'
        ],
        [
            'id' => 2,
            'question' => "Sara saves money and gets profit only if the bank's investment makes money.",
            'answer' => 'Mudarabah'
        ],
        [
            'id' => 3,
            'question' => "Lina wants a brand-new car but prefers renting it first. She pays monthly rental.",
            'answer' => 'Ijarah'
        ],
        [
            'id' => 4,
            'question' => "Uh-oh! Johan's wallet is empty! The bank buys some goods and sells them to him on deferred payment. He turns them into cash, and YAY! Johan is now enjoying his lunch without financial worries!",
            'answer' => 'Tawarruq'
        ],
        [
            'id' => 5,
            'question' => "Amir keeps his money in the bank. Sometimes the bank sends him a little gift as a thank-you.",
            'answer' => 'Wadiah'
        ],
    ];

    private $options = [
        'Murabahah',
        'Mudarabah',
        'Ijarah',
        'Tawarruq',
        'Wadiah'
    ];

    private $marksPerQuestion = 2; // 2 marks per correct answer
    private $totalMarks = 10; // 5 questions × 2 marks = 10 total marks

    public function start()
    {
        // Clear previous session
        session()->forget('module3_answers');
        
        return view('module3.minigame', [
            'scenarios' => $this->scenarios,
            'options' => $this->options
        ]);
    }

    public function submit(Request $request)
    {
        $userAnswers = $request->input('answers', []);
        
        if (empty($userAnswers)) {
            return redirect()->route('module3.minigame')->with('error', 'Please answer all scenarios!');
        }

        // Calculate score (2 marks per correct answer)
        $correctCount = 0;
        $results = [];

        foreach ($this->scenarios as $scenario) {
            $userAnswer = $userAnswers[$scenario['id']] ?? null;
            $isCorrect = $userAnswer === $scenario['answer'];
            
            if ($isCorrect) {
                $correctCount++;
            }

            $results[] = [
                'id' => $scenario['id'],
                'question' => $scenario['question'],
                'userAnswer' => $userAnswer,
                'correctAnswer' => $scenario['answer'],
                'isCorrect' => $isCorrect
            ];
        }

        // Calculate total score (2 marks per correct answer)
        $score = $correctCount * $this->marksPerQuestion;

        $userID = auth()->id();
        $moduleID = 3;

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

        // Check for badge eligibility (score > 5, at least three corrects)
        $badge = null;
        if ($score > 5) {
            $badgeData = Badge::where('badgeName', 'Banking Ustaz')->first();
            
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
        session(['module3_result' => [
            'score' => $score,
            'total' => $this->totalMarks,
            'correctCount' => $correctCount,
            'totalQuestions' => count($this->scenarios),
            'bestScore' => $bestScoreValue,
            'isNewBest' => $isNewBest,
            'badge' => $badge,
            'results' => $results
        ]]);

        return redirect()->route('module3.score');
    }

    public function score()
    {
        $result = session('module3_result');
        
        if (!$result) {
            return redirect()->route('module3.minigame');
        }

        return view('module3.score', compact('result'));
    }
}
