<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MuscleGroupController;
use App\Models\Equipment;
use App\Models\MuscleGroup;

Route::get('/equipment', [EquipmentController::class, 'index']);
Route::post('/equipment', [EquipmentController::class, 'store']);
Route::put('/equipment/{id}', [EquipmentController::class, 'update']);
Route::delete('/equipment/{id}', [EquipmentController::class, 'delete']);

Route::get('muscle-group', [MuscleGroupController::class, 'index']);
Route::post('muscle-group', [MuscleGroupController::class, 'store']);
Route::put('muscle-group/{id}', [MuscleGroupController::class, 'update']);
Route::delete('muscle-group/{id}', [MuscleGroupController::class, 'delete']);
