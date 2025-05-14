<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Home route (welcome page)
Route::get('/', function () {
    return view('welcome');
});

// Protected product routes (only accessible by authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    
    // Redirect authenticated users to products after login
    Route::get('/dashboard', function () {
        return redirect()->route('products.index');
    });
});
