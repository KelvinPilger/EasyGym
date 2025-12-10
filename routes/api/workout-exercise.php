<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutExerciseController;
use App\Models\WorkoutExercise;

Route::prefix('workout-exercise')->group(function () {
    Route::get('/', [WorkoutExerciseController::class, 'index']);
});
