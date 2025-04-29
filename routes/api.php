<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Protected Route (must be logged in)
// Route::middleware(['stateful', 'bindings', 'auth:sanctum'])->get('/me', [AuthController::class, 'me']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('products', ProductController::class);
});
