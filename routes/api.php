<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// Public routes for login
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [UsersController::class, 'register']);

// Authenticated routes 
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/password-reset', [AuthController::class, 'resetPassword'])->name('resetPassword');
});

