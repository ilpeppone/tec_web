<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'benvenuto'])->middleware('auth');


Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy');
Route::get('/terms', [LegalController::class, 'terms'])->name('terms');

Route::get('/events/create_event', [EventController::class, 'create_event'])->name('create_event');
Route::post('/events', [EventController::class, 'store'])->name('events.store');

Route::resource('events', EventController::class);