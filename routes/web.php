<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// Laravel's default authentication routes
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// Your custom product routes
Route::resource('products', ProductController::class);

// Authentication routes for login and logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route for authenticated users to access dashboard
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
});

