<?php

use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\MainController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index']);

// Login Routes
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
 
Route::post('/login', Login::class)
    ->middleware('guest');

// Registration Routes
Route::get('/register', function () {
    return view('auth.register'); // points to resources/views/auth/register.blade.php
})->middleware('guest')
  ->name('register');

Route::post('/register',Register::class)
    ->middleware('guest')
    ->name('register');

// Logout Route
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');

// Habits Routes


Route::middleware('auth')->group(function () {
    Route::get('/allHabits', [HabitController::class, 'index']);
    Route::delete('/allHabits/{habit}', [HabitController::class, 'destroy']);
});