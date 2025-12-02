<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Models\Equipment;

Route::get('/equipment', [EquipmentController::class, 'index']);
Route::post('/equipment', [EquipmentController::class, 'store']);
Route::put('/equipment', [EquipmentController::class, 'update']);
