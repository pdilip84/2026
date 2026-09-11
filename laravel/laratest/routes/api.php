<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/listusers', function () {
    return \App\Models\User::all();
});

Route::post('/login', [AuthController::class, 'login']);
