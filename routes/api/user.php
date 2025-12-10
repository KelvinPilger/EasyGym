<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])
        ->middleware('can:viewAny,' . User::class);

    Route::post('/', [UserController::class, 'store'])
        ->middleware('can:create,' . User::class);

    Route::patch('/{id}', [UserController::class, 'update'])
        ->middleware('can:update,' . User::class);

    Route::put('/{id}', [UserController::class, 'update'])
        ->middleware('can:update,' . User::class);

    Route::delete('/{id}', [UserController::class, 'delete'])
        ->middleware('can:delete,' . User::class);
});