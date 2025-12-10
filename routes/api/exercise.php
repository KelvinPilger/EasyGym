<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Models\Exercise;

Route::prefix('exercise')->group(function () {
    Route::get('/', [ExerciseController::class, 'index']);
    Route::get('/{id}', [ExerciseController::class, 'show']);

    Route::post('/', [ExerciseController::class, 'store'])
        ->middleware('can:create,' . Exercise::class);

    Route::put('/{id}', [ExerciseController::class, 'update'])
        ->middleware('can:update,' . Exercise::class);

    Route::delete('/{id}', [ExerciseController::class, 'delete'])
        ->middleware('can:delete,' . Exercise::class);
});


