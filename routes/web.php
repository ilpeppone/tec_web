<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizerController;

Route::get('/', function () {
    return view('home');
});


Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('showRegisterForm');
Route::post('/register', [UserController::class, 'register'])->name('registerUser');