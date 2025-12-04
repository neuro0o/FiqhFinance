<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleAttempt;
use App\Models\BestScore;
use App\Models\Badge;
use App\Models\UserBadge;


class Module6QuizController extends Controller
{
    /*----------------- MODULE 6 QUESTIONS -------------------*/
    private $questions = [
        [
            'text' => "Zakat is one of the Five Pillars of Islam",
            'answer' => "true",
            'correct_msg' => "Yup! Giving is caring, Zakat is a must!",
            'wrong_msg' => "Oops! Zakat IS one of the Five Pillars of Islam!"
        ],
        [
            'text' => "Zakat must be paid even if wealth is below nisab",
            'answer' => "false",
            'correct_msg' => "Bingo! Below Nisab = No Zakat!",
            'wrong_msg' => "Not quite! Only pay if your wealth hits nisab"
        ],
        [
            'text' => "Hibah takes effect immediately during the giver's lifetime",
            'answer' => "true",
            'correct_msg' => "Correct! Give given, gift received. No waiting time!",
            'wrong_msg' => "Nah! Hibah works right away while the giver is alive"
        ],
        [
            'text' => "Islam encourages unnecessary borrowing",
            'answer' => "false",
            'correct_msg' => "Yes! Avoid unnecessary debt!",
            'wrong_msg' => "Oops! Borrow wisely, don't go broke!"
        ],
        [
            'text' => "Budgeting in Islam discourages charity",
            'answer' => "false",
            'correct_msg' => "Correct! Charity is always encouraged in Islam",
            'wrong_msg' => "Wrong! Budget smart AND give generously"
        ],
        [
            'text' => "Hibah avoids family disputes after death",
            'answer' => "true",
            'correct_msg' => "Spot on! Gifts now = less drama later",
            'wrong_msg' => "Nope! Hibah is great for keeping family's peace"
        ],
        [
            'text' => "Credit cards with interest are allowed in Islam",
            'answer' => "false",
            'correct_msg' => "Right! Avoid interest, stay Halal!",
            'wrong_msg' => "Haha nope! Interest = Riba = Haram!"
        ],
        [
            'text' => "Faraid takes effect during the lifetime of the giver",
            'answer' => "false",
            'correct_msg' => "Correct! Inheritance rules only apply posthumous",
            'wrong_msg' => "Wrong! Faraid only kicks in after death"
        ],
        [
            'text' => "Tawarruq is a Shariah alternative to obtain cash",
            'answer' => "true",
            'correct_msg' => "Yes! Need cash? Turn some goods into cash, Shariah style!",
            'wrong_msg' => "Nope! Tawarruq = Halal cash option"
        ],
        [
            'text' => "Islam prohibits exploitation in finance",
            'answer' => "true",
            'correct_msg' => "Correct! No profit pirates here",
            'wrong_msg' => "Haha nope! Exploitation = Haram"
        ],
    ];

    /*----------------- START QUIZ -------------------*/
    public function start()
    {
        session()->forget('module6_answers');
        return redirect()->route('module6.quiz.show', 1);
    }

    /*----------------- SHOW QUESTION -------------------*/
    public function show($index)
    {
        $total = count($this->questions);
        if ($index < 1 || $index > $total) {
            return redirect()->route('module6.quiz.finish');
        }

        return view('module6.quiz.question', [
            'question' => $this->questions[$index - 1],
            'index' => $index,
            'total' => $total
        ]);
    }

    /*----------------- SAVE ANSWER -------------------*/
    public function answer(Request $request, $index)
    {
        $answers = session('module6_answers', []);
        $answers[$index - 1] = $request->answer;
        session(['module6_answers' => $answers]);

        $question = $this->questions[$index - 1];
        $isCorrect = ($request->answer === $question['answer']);
        $nextIndex = $index + 1;
        $total = count($this->questions);

        return view('module6.quiz.feedback', [
            'isCorrect' => $isCorrect,
            'message' => $isCorrect ? $question['correct_msg'] : $question['wrong_msg'],
            'nextIndex' => $nextIndex,
            'total' => $total
        ]);
    }

    /*----------------- FINISH QUIZ -------------------*/
    public function finish()
    {
        $answers = session('module6_answers', []);
        
        if (empty($answers)) {
            return redirect()->route('module6.quiz.start');
        }

        // Calculate score
        $score = 0;
        foreach ($answers as $i => $ans) {
            if (isset($this->questions[$i]) && $this->questions[$i]['answer'] === $ans) {
                $score++;
            }
        }

        $userID = auth()->id();
        $moduleID = 6;

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
            $badgeData = Badge::where('badgeName', 'Shariah Planner')->first();
            
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
        session()->forget('module6_answers');

        // Store result in session for score page
        $result = [
            'score' => $score,
            'total' => count($this->questions),
            'bestScore' => $bestScoreValue,
            'isNewBest' => $isNewBest,
            'badge' => $badge
        ];

        session(['module6_result' => $result]);

        \Log::info('Quiz finished, result stored in session:', $result);

        return redirect()->route('module6.score');
    }
}