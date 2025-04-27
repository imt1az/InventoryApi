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

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return response()->json($request->user() ?: null);
});
Route::middleware('auth:sanctum')->apiResource('products', ProductController::class);
