<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseSessionController;
use App\Models\ExerciseSession;

Route::prefix('exercise-session')->group(function () {
    Route::get('/', [ExerciseSessionController::class, 'index']);
    Route::post('/', [ExerciseSessionController::class, 'store']);
});
