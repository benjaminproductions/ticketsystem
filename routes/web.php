<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;

Route::get('/login', [LoginController::class, 'loginScreen'])->name('login');
Route::post('/checkLogin', [LoginController::class, 'login'])->name('login.checkLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/', [TicketController::class, 'index'])->name('index');
Route::get('/create', [TicketController::class, 'create'])->name('create');
Route::post('/store', [TicketController::class, 'store'])->name('store');
Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');
Route::get('/{ticket}/delete/', [TicketController::class, 'delete'])->name('delete');
Route::get('/{ticket}/edit', [TicketController::class, 'edit'])->name('edit');
Route::any('/{ticket}/edit/store', [TicketController::class, 'storeEditedTicket'])->name('storeEditedTicket');

Route::prefix('/comment')->group(function () {
    Route::get('/{id}/add/', [CommentController::class, 'add'])->name('addComment');
    Route::post('/{id}/store', [CommentController::class, 'store'])->name('storeComment');
    Route::get('/{id}/{ticketId}/delete', [CommentController::class, 'delete'])->name('deleteComment');
    Route::get('/{id}/delete', [CommentController::class, 'deleteAll'])->name('deleteComments');
});

Route::prefix('/file')->group(function () {
    Route::post('/{ticketId}/uploadTicketFile', [FileController::class, 'uploadTicketFile'])->name('file.ticketfile');
    Route::post('/{commentId}/uploadCommentFile', [FileController::class, 'uploadCommentFile'])->name('file.commentFile');
    Route::get('/{name}', [FileController::class, 'downloadFile'])->name('file');
    Route::get('/{id}/delete', [FileController::class, 'deleteFile'])->name('file.delete');
});
