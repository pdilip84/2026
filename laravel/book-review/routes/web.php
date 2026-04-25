<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/*
Action	Route Name	URL

index	books.index	/books
show	books.show	/books/{id}
destroy	books.destroy	/books/{id}

edit	books.edit	/books/{id}/edit
create	books.create	/books/create
store	books.store	/books
update	books.update	/books/{id}
*/
Route::resource('books', BookController::class);
Route::resource('books.review', ReviewController::class)->only('create', 'store');
