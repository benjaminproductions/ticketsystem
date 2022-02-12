<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [TicketController::class, 'index'])->name('index');
Route::get('/create', [TicketController::class, 'create'])->name('create');
Route::post('/store', [TicketController::class, 'store'])->name('store');
Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');
Route::get('/delete/{id}', [TicketController::class, 'delete'])->name('delete');
Route::get('/edit/{ticket}', [TicketController::class, 'edit'])->name('edit');
Route::get('/addComment/{id}', [TicketController::class, 'addComment'])->name('addComment');
Route::post('/storeComment/{id}', [TicketController::class, 'storeComment'])->name('storeComment');
Route::get('/deleteComments/{id}', [TicketController::class, 'deleteComments'])->name('deleteComments');

Route::get('/file/{name}', function ($name) {
    return Storage::download('file' . $name);
});