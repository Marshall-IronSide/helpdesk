<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\URL;

// Routes publiques
Route::get('/login',     [LoginController::class,    'showLogin'])->name('login');
Route::post('/login',    [LoginController::class,    'login']);
Route::get('/register',  [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout',   [LoginController::class,    'logout'])->name('logout');

// Routes protégées
Route::middleware('auth')->group(function () {
    Route::get('/', fn() => redirect()->route('tickets.index'));

    // Tickets filtrés (ouverts / résolus)
    Route::get('/tickets/status/{status}', [TicketController::class, 'filtered'])
         ->name('tickets.filtered')
         ->where('status', 'open|resolved');

    Route::resource('tickets', TicketController::class)->only([
        'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
    ]);

    Route::patch('tickets/{ticket}/resolve', [TicketController::class, 'resolve'])
         ->name('tickets.resolve');

    // Commentaires
    Route::post('tickets/{ticket}/comments', [CommentController::class, 'store'])
         ->name('comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])
         ->name('comments.destroy');
});


URL::forceScheme('https');
