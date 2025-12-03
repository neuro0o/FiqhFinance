<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\Module4QuizController;
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

// Middleware for authenticated users
Route::middleware(['auth'])->group(function () {

    /*----------------- MODULE NOTE ROUTES -------------------*/
    Route::get('/module1/note', function () {
        return view('module1.note');
    })->name('module1.note');

    Route::get('/module2/note', function () {
        return view('module2.note');
    })->name('module2.note');

    Route::get('/module3/note', function () {
        return view('module3.note');
    })->name('module3.note');

    Route::get('/module5/note', function () {
        return view('module5.note');
    })->name('module5.note');

    Route::get('/module6/note', function () {
        return view('module6.note');
    })->name('module6.note');
});



