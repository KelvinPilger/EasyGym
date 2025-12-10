<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuscleGroupController;
use App\Models\MuscleGroup;

Route::prefix('muscle-group')->group(function () {
    Route::get('/', [MuscleGroupController::class, 'index']);

    Route::post('/', [MuscleGroupController::class, 'store'])
        ->middleware('can:create,' . MuscleGroup::class);

    Route::put('/{id}', [MuscleGroupController::class, 'update'])
        ->middleware('can:update,' . MuscleGroup::class);

    Route::delete('/{id}', [MuscleGroupController::class, 'delete'])
        ->middleware('can:delete,' . MuscleGroup::class);
});