<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\URL;

Route::get('/', fn() => redirect()->route('tickets.index'));

Route::resource('tickets', TicketController::class)->only([
    'index',
    'create',
    'store',
    'show'
]);

Route::patch('tickets/{ticket}/resolve', [TicketController::class, 'resolve'])
    ->name('tickets.resolve');

URL::forceScheme('https');
