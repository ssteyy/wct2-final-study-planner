<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\StudySessionController;
use App\Http\Controllers\API\ProgressReportController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::apiResource('users', UserController::class);
Route::get('/users', [UserController::class, 'index']);


// All routes below require auth
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [UserController::class, 'logout']);

    // ✅ Secure these API resources
    Route::apiResource('subjects', SubjectController::class);
    Route::apiResource('study-sessions', StudySessionController::class);
    Route::apiResource('progress-reports', ProgressReportController::class);
});