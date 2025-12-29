<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseSessionController;
use App\Models\ExerciseSession;

Route::prefix('exercise-session')->group(function () {
    Route::get('/', [ExerciseSessionController::class, 'index']);
    Route::post('/', [ExerciseSessionController::class, 'store'])
        ->middleware('can:create,' . ExerciseSession::class);
    Route::put('/{id}', [ExerciseSessionController::class, 'update'])
        ->middleware('can:update,' . ExerciseSession::class);
    Route::delete('/{id}', [ExerciseSessionController::class, 'delete'])
        ->middleware('can:delete,' . ExerciseSession::class);
});
