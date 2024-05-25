<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'create'])
        ->name('user.create');

    Route::post('/register', [RegisterUserController::class, 'store'])
        ->name('user.store');

    Route::get('/login', [LoginUserController::class, 'create'])
        ->name('user.login');

    Route::post('/login', [LoginUserController::class, 'store'])
        ->name('user.auth');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
        ->name('password.forgot');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password', [ResetPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'store'])
        ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)->middleware('signed')
        ->name('verification.verify');

    Route::post('/email/verification-notification', EmailVerificationNotificationController::class)
        ->name('verification.send');

    Route::post('/logout', [LoginUserController::class, 'destroy'])
        ->name('user.logout');
});
