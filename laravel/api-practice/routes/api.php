<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// I need to authenticate the user before accessing the API routes, so I will add the 'auth:sanctum' middleware to the API routes.
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('schools', \App\Http\Controllers\SchoolController::class);
    Route::apiResource('students', \App\Http\Controllers\StudentController::class);
    Route::match(['put', 'patch'], 'students/update/{student}', [\App\Http\Controllers\StudentController::class, 'update']);
});
