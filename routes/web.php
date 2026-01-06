<?php

use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DiaryController;
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
    return view('auth.register');
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
    Route::get('/allHabits', [HabitController::class, 'index'])->name('allHabits');
    Route::delete('/allHabits/{habit}', [HabitController::class, 'destroy']);
    Route::view('/newHabit', 'habits.createHabit')->name('newHabit');
    Route::post('/newHabit', [HabitController::class, 'store']);
    Route::put('/allHabits/{habit}', [HabitController::class, 'complete']);
});

// Diary Routes
Route::middleware('auth')->group(function () {
    Route::get('/diary', [DiaryController::class, 'index'])->name('diary');
    Route::view('/newEntry', 'diary.newEntry')->name('createDiaryEntry');
    Route::post('/newEntry', [DiaryController::class, 'store']);
});