<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleAttempt;
use App\Models\BestScore;
use App\Models\Badge;
use App\Models\UserBadge;
use Carbon\Carbon;

class Module5QuizController extends Controller
{
    private $scenarios = [
        [
            'id' => 1,
            'question' => "A company issues certificates backed by a highway project. Some investors are interested in making every toll payment = their earnings. No interest, all Halal!",
            'answer' => 'Sukuk'
        ],
        [
            'id' => 2,
            'question' => "Abu wants to invest his money but he's a beginner. He just wants someone to handle his money while he chills. Let the pros do their magic!",
            'answer' => 'Islamic Unit Trust'
        ],
        [
            'id' => 3,
            'question' => "Amir buys shares of a Halal company. BOOM! He's now a mini-boss! He owns part of the Halal company and cheers for profits as it skyrockets!",
            'answer' => 'Shariah-Compliant Stocks'
        ],
        [
            'id' => 4,
            'question' => "Fina invests in a RnR service area. Her money grows steadily, safe and Halal! 'It really is good to have investment backed by real asset', She said.",
            'answer' => 'Islamic Bonds'
        ],
        [
            'id' => 5,
            'question' => "Oops, a little non-Halal income sneaked in... no worries! Let's donate it to charity. Let our income be purified and blessed!",
            'answer' => 'Islamic Funds'
        ],
    ];

    private $options = [
        'Sukuk',
        'Islamic Unit Trust',
        'Shariah-Compliant Stocks',
        'Islamic Bonds',
        'Islamic Funds'
    ];

    private $marksPerQuestion = 2; // 2 marks per correct answer
    private $totalMarks = 10; // 5 questions × 2 marks = 10 total marks

    public function start()
    {
        // Clear previous session
        session()->forget('module5_answers');
        
        return view('module5.minigame', [
            'scenarios' => $this->scenarios,
            'options' => $this->options
        ]);
    }

    public function submit(Request $request)
    {
        $userAnswers = $request->input('answers', []);
        
        if (empty($userAnswers)) {
            return redirect()->route('module5.minigame')->with('error', 'Please answer all scenarios!');
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
        $moduleID = 5;

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
            $badgeData = Badge::where('badgeName', 'Halal Investor')->first();
            
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
        session(['module5_result' => [
            'score' => $score,
            'total' => $this->totalMarks,
            'correctCount' => $correctCount,
            'totalQuestions' => count($this->scenarios),
            'bestScore' => $bestScoreValue,
            'isNewBest' => $isNewBest,
            'badge' => $badge,
            'results' => $results
        ]]);

        return redirect()->route('module5.score');
    }

    public function score()
    {
        $result = session('module5_result');
        
        if (!$result) {
            return redirect()->route('module5.minigame');
        }

        return view('module5.score', compact('result'));
    }
}
