<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\AuthController;

/* ================= AUTH ================= */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register1', [AuthController::class, 'register1'])->name('bene');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ============== PROTECTED =============== */
Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('tasks', TaskController::class);
    Route::resource('reminders', ReminderController::class);
    Route::resource('notes', NoteController::class);
    Route::resource('forums', ForumController::class);
    Route::resource('manage', ManageController::class);

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});
