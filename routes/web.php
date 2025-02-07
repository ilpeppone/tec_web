<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizerController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Route per la registrazione
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('showRegisterForm');
Route::post('/register', [UserController::class, 'register'])->name('registerUser');

// Route per il login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [UserController::class, 'login'])->name('loginUser');

// Route per il logout
Route::post('/logout', [UserController::class, 'logout'])->name('logoutUser');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
