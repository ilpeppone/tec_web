<?php
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy');
Route::get('/terms', [LegalController::class, 'terms'])->name('terms');

Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
Route::resource('events', EventController::class);
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/filter', [EventController::class, 'filter'])->name('events.filter');

Route::get('/about', [LegalController::class, 'about'])->name('about');
Route::get('/help', [LegalController::class, 'help'])->name('help');

Route::post('/contattaci', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/contattaci', [ContactController::class, 'index'])->name('contact');

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/admin/promote', [AdminController::class, 'showPromoteForm'])->name('admin.promote.form');
    Route::post('/admin/promote', [AdminController::class, 'promote'])->name('admin.promote');
    Route::post('/events/{event}/participate', [EventController::class, 'participate'])->name('events.participate');
    Route::delete('/events/{event}/unparticipate', [EventController::class, 'unparticipate'])->name('events.unparticipate');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/home', [HomeController::class, 'home'])->name('home');
});

Route::middleware([\App\Http\Middleware\AdminMiddleware::class, 'verified'])->group(function () {
    Route::get('/admin/pending', [AdminController::class, 'pending'])->name('admin.pending');
    Route::get('/admin/events/{id}', [AdminController::class, 'adminShow'])->name('admin.events.show');
    Route::patch('/events/{id}/approve', [AdminController::class, 'approve'])->name('admin.approve');
    Route::delete('/admin/events/{id}', [AdminController::class, 'destroy'])->name('admin.events.destroy');
    Route::patch('/events/{id}/approve/form', [AdminController::class, 'approveform'])->name('admin.approveform');
    Route::delete('/admin/events/{id}/form', [AdminController::class, 'destroyform'])->name('admin.events.destroyform');
});


