<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MuscleGroupController;
use App\Http\Controllers\UserController;
use App\Models\Equipment;
use App\Models\MuscleGroup;

Route::post('/login', [AuthApiController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthApiController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/equipment', [EquipmentController::class, 'index']);
    Route::post('/equipment', [EquipmentController::class, 'store']);
    Route::put('/equipment/{id}', [EquipmentController::class, 'update']);
    Route::delete('/equipment/{id}', [EquipmentController::class, 'delete']);

    Route::get('muscle-group', [MuscleGroupController::class, 'index']);
    Route::post('muscle-group', [MuscleGroupController::class, 'store']);
    Route::put('muscle-group/{id}', [MuscleGroupController::class, 'update']);
    Route::delete('muscle-group/{id}', [MuscleGroupController::class, 'delete']);

    Route::post('/user', [UserController::class, 'store']);
    Route::delete('user/{id}', [UserController::class, 'delete']);
});
