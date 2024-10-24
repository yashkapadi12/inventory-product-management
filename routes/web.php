<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home'); 
})->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']); 

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UsersController::class, 'register']); 

Route::get('/password-reset', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/password-reset', [AuthController::class, 'resetPassword']); 


Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

// Product routes 

Route::prefix('auth')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['admin'])->group(function () {
        Route::resource('product', ProductController::class)->except(['index']);
        Route::get('csvDownload', [ProductController::class, 'downloadCSV'])->name('csvDownload');
    });

    // Define the index route for products
    Route::get('product', [ProductController::class, 'index'])->name('product.index');

});




