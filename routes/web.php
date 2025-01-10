<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventBackendController;
use App\Http\Controllers\UserBackendController;
use App\Http\Controllers\MessagesBackendController;
use App\Http\Controllers\ReservationBackendController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/event', [EventController::class, 'index'])->name('events');
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');
Route::post('/message/send', [EventController::class, 'store'])->name('message');
Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store')->middleware('auth');


Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware("auth");
    Route::resource('eventsBackend', EventBackendController::class);
    Route::resource('usersBackend', UserBackendController::class);
    Route::resource('messagesBackend', MessagesBackendController::class);
    Route::resource('reservationsBackend', ReservationBackendController::class);
});
