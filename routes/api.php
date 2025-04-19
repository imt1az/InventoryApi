<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Protected Route (must be logged in)
Route::middleware(['stateful', 'bindings', 'auth:sanctum'])->get('/me', [AuthController::class, 'me']);
