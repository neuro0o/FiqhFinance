<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleAttempt;
use App\Models\BestScore;
use App\Models\Badge;
use App\Models\UserBadge;


class Module1QuizController extends Controller
{
    /*----------------- MODULE 1 QUESTIONS -------------------*/
    private $questions = [
        [
            'text' => "Islamic Finance says money cannot magically grow by itself without real business activity",
            'answer' => "true",
            'correct_msg' => "Right! Money works, not magic",
            'wrong_msg' => "Oops! Money needs work to grow, not magic!"
        ],
        [
            'text' => "'Bro just charge a litte interest only lah, small one'. Does Islamic Finance approve this statement?",
            'answer' => "false",
            'correct_msg' => "Bingo! Riba is Haram, whether small or big!",
            'wrong_msg' => "Nope! Interest is a no-no"
        ],
        [
            'text' => "Islamic Finance promotes fairness and transparency. No sneaky terms, no trap",
            'answer' => "true",
            'correct_msg' => "Yes! Clear deals, no sneaky tricks",
            'wrong_msg' => "Nah, Islamic Finance loves honesty"
        ],
        [
            'text' => "If you lend RM 100 and get back RM 150 just because you waited... Islamic Finance approves this",
            'answer' => "false",
            'correct_msg' => "Correct! Money needs to grow via effort & trade!",
            'wrong_msg' => "Wrong! Profit can't come from waiting alone!"
        ],
        [
            'text' => "Halal investments should benefit society and avoid harm",
            'answer' => "true",
            'correct_msg' => "Spot on! Do good & avoid harm",
            'wrong_msg' => "Nope! Halal investment means helping society!"
        ],
        [
            'text' => "Coventional loans usually put all risk on the borrower",
            'answer' => "true",
            'correct_msg' => "Yes! Borrower takes full damage",
            'wrong_msg' => "Not quite! Conventional loans don't care about their borrower!"
        ],
        [
            'text' => "As long as both agree, interest is Halal",
            'answer' => "false",
            'correct_msg' => "Correct! Riba is always Haram no maater what",
            'wrong_msg' => "Nope! Agreement doesn't make Riba okay!"
        ],
        [
            'text' => "Islamic Finance encourages responsible, ethical financial behavior",
            'answer' => "true",
            'correct_msg' => "Yup! Be smart, be ethical",
            'wrong_msg' => "Wrong! Ethics matter big time!"
        ],
        [
            'text' => "Exploiting people for profit is prohibited",
            'answer' => "true",
            'correct_msg' => "Correct! Don't be a profit pirate",
            'wrong_msg' => "Nope! Exploitation is a no-no"
        ],
        [
            'text' => "Conventional finance requires all investments to be Halal",
            'answer' => "false",
            'correct_msg' => "Right! Conventional finance doesn't care Halal or Haram as long as it's profitable for them",
            'wrong_msg' => "Wrong! Halal rules don't apply here"
        ],
    ];

    /*----------------- START QUIZ -------------------*/
    public function start()
    {
        session()->forget('module1_answers');
        return redirect()->route('module1.quiz.show', 1);
    }

    /*----------------- SHOW QUESTION -------------------*/
    public function show($index)
    {
        $total = count($this->questions);
        if ($index < 1 || $index > $total) {
            return redirect()->route('module1.quiz.finish');
        }

        return view('module1.quiz.question', [
            'question' => $this->questions[$index - 1],
            'index' => $index,
            'total' => $total
        ]);
    }

    /*----------------- SAVE ANSWER -------------------*/
    public function answer(Request $request, $index)
    {
        $answers = session('module1_answers', []);
        $answers[$index - 1] = $request->answer;
        session(['module1_answers' => $answers]);

        $question = $this->questions[$index - 1];
        $isCorrect = ($request->answer === $question['answer']);
        $nextIndex = $index + 1;
        $total = count($this->questions);

        return view('module1.quiz.feedback', [
            'isCorrect' => $isCorrect,
            'message' => $isCorrect ? $question['correct_msg'] : $question['wrong_msg'],
            'nextIndex' => $nextIndex,
            'total' => $total
        ]);
    }

    /*----------------- FINISH QUIZ -------------------*/
    public function finish()
    {
        $answers = session('module1_answers', []);
        
        if (empty($answers)) {
            return redirect()->route('module1.quiz.start');
        }

        // Calculate score
        $score = 0;
        foreach ($answers as $i => $ans) {
            if (isset($this->questions[$i]) && $this->questions[$i]['answer'] === $ans) {
                $score++;
            }
        }

        $userID = auth()->id();
        $moduleID = 1;

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
            $badgeData = Badge::where('badgeName', 'Islamic Financial Explorer')->first();
            
            if ($badgeData) {
                $badge = [
                    'badgeName' => $badgeData->badgeName,
                    'badgeDesc' => $badgeData->badgeDesc ?? '',
                    'badgeIcon' => $badgeData->badgeIcon ?? '',
                ];

                // Save to user_badges if not already earned
                \DB::table('user_badges')->updateOrInsert(
                    [
                        'userID' => $userID,
                        'badgeID' => $badgeData->badgeID
                    ],
                    ['earned_at' => now()]
                );
            }
        }

        // Clear answers from session
        session()->forget('module1_answers');

        // Store result in session for score page
        $result = [
            'score' => $score,
            'total' => count($this->questions),
            'bestScore' => $bestScoreValue,
            'isNewBest' => $isNewBest,
            'badge' => $badge
        ];

        session(['module1_result' => $result]);

        \Log::info('Quiz finished, result stored in session:', $result);

        return redirect()->route('module1.score');
    }
}