<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskApiController;

Route::get('/tasks', [TaskApiController::class, 'index']);
Route::get('/tasks/{id}', [TaskApiController::class, 'show']);
Route::post('/tasks', [TaskApiController::class, 'store']);
Route::put('/tasks/{id}', [TaskApiController::class, 'update']);
Route::delete('/tasks/{id}', [TaskApiController::class, 'destroy']);
