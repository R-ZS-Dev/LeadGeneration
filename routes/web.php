<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailSettingsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('login'); });
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/app-chat', function () { return view('app-chat');
    })->name('app-chat');
    Route::get('/app-calendar', function () {
        return view('app-calendar');
    })->name('app-calendar');
    Route::get('/profile-setting', function () {
        return view('profile-setting');
    })->name('profile-setting');

    Route::controller(SettingsController::class)->group(function () {
        Route::post('update-profile', 'updateProfile')->name('settings.updateProfile');
        Route::post('update-password', 'updatePassword')->name('settings.updatePassword');
        Route::post('update-email', 'updateEmail')->name('settings.updateEmail');
    });

    Route::controller(EmailSettingsController::class)->group(function () {
        Route::get('/email-config', 'showForm')->name('settings.email');
        Route::post('/email-config', 'updateEmailConfig')->name('settings.updateEmail');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::post('update-company', [CompanyController::class, 'updateCompany'])->name('settings.updateCompany');

    Route::controller(RegisteredUserController::class)->group(function () {
        Route::get('/register', function () { return view('register'); })->name('register');
        Route::post('/register', 'store')->name('register');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/all-users', 'index')->name('all-users');
        Route::delete('/users/{id}', 'destroy')->name('users.destroy');
    });
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', function () { return view('register'); })->name('register');
    Route::post('/register', 'store')->name('register');
});

Route::controller(ForgotPasswordController::class)->group(function (){
    Route::get('/forget-password', 'showForgetPasswordForm')->name('forget-password');
    Route::post('/forget-password', 'submitForgetPasswordForm')->name('password.email');
    
    Route::get('/reset-password', 'showResetPasswordForm')->name('password.reset');
    Route::post('/reset-password', 'submitResetPasswordForm')->name('password.update');
});