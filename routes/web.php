<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\ModuleController;
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


// Middleware for authenticated users
Route::middleware(['auth'])->group(function () {

    // Module Notes
    Route::get('/module1/note', function () {
        return view('module 1.note');
    })->name('module1.note');

    Route::get('/module2/note', function () {
        return view('module 2.note');
    })->name('module2.note');

    Route::get('/module3/note', function () {
        return view('module 3.note');
    })->name('module3.note');

    Route::get('/module4/note', function () {
        return view('module 4.note');
    })->name('module4.note');

    Route::get('/module5/note', function () {
        return view('module 5.note');
    })->name('module5.note');

    Route::get('/module6/note', function () {
        return view('module 6.note');
    })->name('module6.note');

    

    // Module MiniGames
    Route::get('/module1/minigame', function () {
        return view('module 1.minigame');
    })->name('module1.minigame');

    Route::get('/module2/minigame', function () {
        return view('module 2.minigame');
    })->name('module2.minigame');

    Route::get('/module3/minigame', function () {
        return view('module 3.minigame');
    })->name('module3.minigame');

    Route::get('/module4/minigame', function () {
        return view('module 4.minigame');
    })->name('module4.minigame');

    Route::get('/module5/minigame', function () {
        return view('module 5.minigame');
    })->name('module5.minigame');

    Route::get('/module6/minigame', function () {
        return view('module 6.minigame');
    })->name('module6.minigame');

    // Module Scores
    Route::get('/module1/score', function () {
        return view('module 1.score');
    })->name('module1.score');

    Route::get('/module2/score', function () {
        return view('module 2.score');
    })->name('module2.score');

    Route::get('/module3/score', function () {
        return view('module 3.score');
    })->name('module3.score');

    Route::get('/module4/score', function () {
        return view('module 4.score');
    })->name('module4.score');

    Route::get('/module5/score', function () {
        return view('module 5.score');
    })->name('module5.score');

    Route::get('/module6/score', function () {
        return view('module 6.score');
    })->name('module6.score');
});
