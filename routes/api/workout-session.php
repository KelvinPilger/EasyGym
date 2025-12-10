<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutSessionController;
use App\Models\WorkoutSession;

Route::prefix('workout-session')->group(function () {
    Route::get('/', [WorkoutSessionController::class, 'index']);
    Route::get('/{id}', [WorkoutSessionController::class, 'show']);

    Route::post('/', [WorkoutSessionController::class, 'store']);

    Route::put('/{id}', [WorkoutSessionController::class, 'update']);

    Route::delete('/{id}', [WorkoutSessionController::class, 'delete'])
        ->middleware('can:delete,' . WorkoutSession::class);
});