<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Models\Equipment;

Route::prefix('equipment')->group(function () {
    Route::get('/', [EquipmentController::class, 'index']);

    Route::post('/', [EquipmentController::class, 'store'])
        ->middleware('can:create,' . Equipment::class);

    Route::put('/{id}', [EquipmentController::class, 'update'])
        ->middleware('can:update,' . Equipment::class);

    Route::delete('/{id}', [EquipmentController::class, 'delete'])
        ->middleware('can:delete,' . Equipment::class);
});