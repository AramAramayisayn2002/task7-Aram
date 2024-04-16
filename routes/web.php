<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

Route::get('/', [BookController::class, 'welcome']);
Route::get('/authors', [AuthorController::class, 'welcome']);
Route::prefix('/admin')->group(function () {
    Route::resource('/', AdminController::class, ['only' => ['index']]);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::post('/login', [AdminController::class, 'login'])->name('login');
    Route::middleware('auth')->group(function () {
        Route::resource('books', BookController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
        Route::resource('authors', AuthorController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::get('/authors/search', [AuthorController::class, 'search'])->name('authors.search');
    });
});
