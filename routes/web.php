<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\Module1QuizController;
use App\Http\Controllers\Module3QuizController;
use App\Http\Controllers\Module4QuizController;
use App\Http\Controllers\Module5QuizController;
use App\Http\Controllers\Module6QuizController;
use App\Http\Controllers\LeaderboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// LANDING
Route::get('/', function () {
    return view('landing');
    // return view('user/dashboard');
});

/*----------------- AUTH ROUTES -------------------*/
// REGISTER
Route::get('register', [RegistrationController::class, 'showForm'])
    ->name('register');
Route::post('register', [RegistrationController::class, 'processForm'])
    ->name('register.process');

// LOGIN
Route::get('login', [AuthController::class, 'showLoginForm'])
    ->name('login');
Route::post('login', [AuthController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/'); // landing page
})->name('logout');

// Account Settings
Route::middleware(['auth'])->prefix('account')->group(function () {
    Route::get('/settings', [AccountSettingsController::class, 'index'])->name('account.settings');
    Route::put('/update', [AccountSettingsController::class, 'updateProfile'])->name('account.update');
    Route::put('/update-password', [AccountSettingsController::class, 'updatePassword'])->name('account.update.password');
    Route::delete('/account/delete', [AccountSettingsController::class, 'deleteAccount'])->name('account.delete');

    // Route for AJAX modal
    Route::get('/settings/modal', [AccountSettingsController::class, 'modal'])->name('account.settings.modal');
});

// USER HOME @ DASHBOARD
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth')->name('user.dashboard');


/*----------------- MODULE 1 ROUTES -------------------*/
Route::middleware(['auth'])->group(function () {
    
    // Module 1 Note Routes
    Route::get('/module1/note', function () {
        return view('module1.note');
    })->name('module1.note');

    // Module 1 Quiz Routes
    Route::get('/module1/quiz', [Module1QuizController::class, 'start'])
        ->name('module1.quiz.start');
    
    Route::get('/module1/quiz/{index}', [Module1QuizController::class, 'show'])
        ->name('module1.quiz.show')
        ->where('index', '[0-9]+'); // Add constraint
    
    Route::post('/module1/quiz/{index}/answer', [Module1QuizController::class, 'answer'])
        ->name('module1.quiz.answer')
        ->where('index', '[0-9]+'); // Add constraint
    
    // IMPORTANT: This must come AFTER the {index} route
    Route::get('/module1/quiz/finish', [Module1QuizController::class, 'finish'])
        ->name('module1.quiz.finish');

    // Score display only (no processing)
    Route::get('/module1/score', function () {
        \Log::info('Score page accessed');
        $result = session('module1_result');
        \Log::info('Result from session:', ['result' => $result]);
        return view('module1.quiz.score', compact('result'));
    })->name('module1.score');
});


/*----------------- MODULE 3 ROUTES -------------------*/
Route::middleware(['auth'])->group(function () {

    // Module 3 Note Routes
    Route::get('/module3/note', function () {
        return view('module3.note');
    })->name('module3.note');

    // Module 3 Mini-Game Routes
    Route::get('/module3/minigame', [Module3QuizController::class, 'start'])
        ->name('module3.minigame');
    Route::post('/module3/minigame/submit', [Module3QuizController::class, 'submit'])
        ->name('module3.minigame.submit');
    Route::get('/module3/score', [Module3QuizController::class, 'score'])
        ->name('module3.score');
});

/*----------------- MODULE 4 ROUTES -------------------*/
Route::middleware(['auth'])->group(function () {
    
    // Module 4 Note Routes
    Route::get('/module4/note', function () {
        return view('module4.note');
    })->name('module4.note');

    // Module 4 Quiz Routes
    Route::get('/module4/quiz', [Module4QuizController::class, 'start'])
        ->name('module4.quiz.start');
    
    Route::get('/module4/quiz/{index}', [Module4QuizController::class, 'show'])
        ->name('module4.quiz.show')
        ->where('index', '[0-9]+'); // Add constraint
    
    Route::post('/module4/quiz/{index}/answer', [Module4QuizController::class, 'answer'])
        ->name('module4.quiz.answer')
        ->where('index', '[0-9]+'); // Add constraint
    
    // IMPORTANT: This must come AFTER the {index} route
    Route::get('/module4/quiz/finish', [Module4QuizController::class, 'finish'])
        ->name('module4.quiz.finish');

    // Score display only (no processing)
    Route::get('/module4/score', function () {
        \Log::info('Score page accessed');
        $result = session('module4_result');
        \Log::info('Result from session:', ['result' => $result]);
        return view('module4.quiz.score', compact('result'));
    })->name('module4.score');
});

/*----------------- MODULE 5 ROUTES -------------------*/
Route::middleware(['auth'])->group(function () {

    // Module 5 Note Routes
    Route::get('/module5/note', function () {
        return view('module5.note');
    })->name('module5.note');

    // Module 5 Mini-Game Routes
    Route::get('/module5/minigame', [Module5QuizController::class, 'start'])
        ->name('module5.minigame');
    Route::post('/module5/minigame/submit', [Module5QuizController::class, 'submit'])
        ->name('module5.minigame.submit');
    Route::get('/module5/score', [Module5QuizController::class, 'score'])
        ->name('module5.score');
});

/*----------------- MODULE 6 ROUTES -------------------*/
Route::middleware(['auth'])->group(function () {
    
    // Module 6 Note Routes
    Route::get('/module6/note', function () {
        return view('module6.note');
    })->name('module6.note');

    // Module 6 Quiz Routes
    Route::get('/module6/quiz', [Module6QuizController::class, 'start'])
        ->name('module6.quiz.start');
    
    Route::get('/module6/quiz/{index}', [Module6QuizController::class, 'show'])
        ->name('module6.quiz.show')
        ->where('index', '[0-9]+'); // Add constraint
    
    Route::post('/module6/quiz/{index}/answer', [Module6QuizController::class, 'answer'])
        ->name('module6.quiz.answer')
        ->where('index', '[0-9]+'); // Add constraint
    
    // IMPORTANT: This must come AFTER the {index} route
    Route::get('/module6/quiz/finish', [Module6QuizController::class, 'finish'])
        ->name('module6.quiz.finish');

    // Score display only (no processing)
    Route::get('/module6/score', function () {
        \Log::info('Score page accessed');
        $result = session('module6_result');
        \Log::info('Result from session:', ['result' => $result]);
        return view('module6.quiz.score', compact('result'));
    })->name('module6.score');
});

/*----------------- LEADERBOARD ROUTE -------------------*/
Route::middleware(['auth'])->group(function () {
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])
        ->name('leaderboard');
});





// Middleware for authenticated users (delete later)
Route::middleware(['auth'])->group(function () {

    /*----------------- MODULE NOTE ROUTES -------------------*/
    Route::get('/module2/note', function () {
        return view('module2.note');
    })->name('module2.note');
});



