<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;
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
