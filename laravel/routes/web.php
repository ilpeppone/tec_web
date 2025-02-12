<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'benvenuto'])->middleware('auth')->name('home');

Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy');
Route::get('/terms', [LegalController::class, 'terms'])->name('terms');

Route::resource('events', EventController::class);
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{event}/participate', [EventController::class, 'participate'])->name('events.participate');
Route::delete('/events/{event}/unparticipate', [EventController::class, 'unparticipate'])->name('events.unparticipate');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contattaci', function () {
    return view('contacts');
})->name('contact');

Route::post('/contattaci', [ContactController::class, 'submit'])->name('contact.submit');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

Route::patch('/events/{id}/approve', [EventController::class, 'approve'])->name('events.approve')->middleware('auth', 'admin');

Route::get('/admin/promote', [AdminController::class, 'showPromoteForm'])->name('admin.promote.form')->middleware('auth');
Route::post('/admin/promote', [AdminController::class, 'promote'])->name('admin.promote')->middleware('auth');
