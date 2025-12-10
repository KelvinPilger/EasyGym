<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Models\Workout;

Route::prefix('workout')->group(function () {
    // listando por usuário (mantém sua rota original: /workout/{user_id})
    Route::get('/{user_id}', [WorkoutController::class, 'index']);

    Route::post('/', [WorkoutController::class, 'store'])
        ->middleware('can:create,' . Workout::class);

    Route::put('/{id}', [WorkoutController::class, 'update'])
        ->middleware('can:update,' . Workout::class);

    Route::delete('/{id}', [WorkoutController::class, 'delete'])
        ->middleware('can:delete,' . Workout::class);
});