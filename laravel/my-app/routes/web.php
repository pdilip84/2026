<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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

Route::get('/members', [MemberController::class, 'index'])->name('members.index');

Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');

Route::get('/members/{member}', [MemberController::class, 'show'])->name('members.show');

Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');

Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

Route::post('/members', [MemberController::class, 'store'])->name('members.store');

Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
