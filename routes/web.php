<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\URL;

// Routes publiques (auth)
Route::get('/login',    [LoginController::class,    'showLogin'])->name('login');
Route::post('/login',   [LoginController::class,    'login']);
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register',[RegisterController::class, 'register']);
Route::post('/logout',  [LoginController::class,    'logout'])->name('logout');

// Routes protégées (login obligatoire)
Route::middleware('auth')->group(function () {
    Route::get('/', fn() => redirect()->route('tickets.index'));

    Route::resource('tickets', TicketController::class)->only([
        'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
    ]);

    Route::patch('tickets/{ticket}/resolve', [TicketController::class, 'resolve'])
         ->name('tickets.resolve');
});


//URL::forceScheme('https');
