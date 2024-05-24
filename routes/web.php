<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

Route::get('/register', [RegisterUserController::class, 'create'])->name('user.create');
Route::post('/register', [RegisterUserController::class, 'store'])->name('user.store');

Route::get('/login', [LoginUserController::class, 'create'])->name('user.login');
Route::post('/login', [LoginUserController::class, 'store'])->name('user.auth');
Route::post('/logout', [LoginUserController::class, 'destroy'])->name('user.logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.forgot');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

Route::get('/reset-password', [ResetPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
