<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TicketController::class, 'index'])->name('name');
Route::get('/create', [TicketController::class, 'create'])->name('create');
Route::post('/store', [TicketController::class, 'store'])->name('store');
Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');
Route::get('/delete/{id}', [TicketController::class, 'delete'])->name('delete');
