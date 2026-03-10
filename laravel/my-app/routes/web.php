<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/members', [App\Http\Controllers\MemberController::class, 'index'])->name('members.index');

Route::get('/members/create', [App\Http\Controllers\MemberController::class, 'create'])->name('members.create');

Route::get('/members/{id}', [App\Http\Controllers\MemberController::class, 'show'])->name('members.show');

Route::get('/members/{id}/edit', [App\Http\Controllers\MemberController::class, 'edit'])->name('members.edit');

Route::delete('/members/{id}', [App\Http\Controllers\MemberController::class, 'destroy'])->name('members.destroy');

Route::post('/members', [App\Http\Controllers\MemberController::class, 'store'])->name('members.store');

Route::put('/members/{id}', [App\Http\Controllers\MemberController::class, 'update'])->name('members.update');
