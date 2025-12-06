<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MuscleGroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\WorkoutSessionController;
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

    Route::get('/user', [UserController::class, 'index']);
    Route::patch('/user/{id}', [UserController::class, 'update']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::post('/user', [UserController::class, 'store']);
    Route::delete('user/{id}', [UserController::class, 'delete']);

    Route::get('/exercise', [ExerciseController::class, 'index']);
    Route::get('/exercise/{id}', [ExerciseController::class, 'show']);
    Route::post('/exercise', [ExerciseController::class, 'store']);
    Route::put('/exercise/{id}', [ExerciseController::class, 'update']);
    Route::delete('/exercise/{id}', [ExerciseController::class, 'delete']);

    Route::get('/workout/{user_id}', [WorkoutController::class, 'index']);
	Route::post('/workout', [WorkoutController::class, 'store']);
	Route::put('/workout/{id}', [WorkoutController::class, 'update']);
    Route::delete('/workout/{id}', [WorkoutController::class, 'delete']);

    Route::get('/workout-session', [WorkoutSessionController::class, 'index']);
    Route::get('/workout-session/{id}', [WorkoutSessionController::class, 'show']);
	Route::post('/workout-session', [WorkoutSessionController::class, 'store']);
	Route::put('/workout-session/{id}', [WorkoutSessionController::class, 'update']);
    Route::delete('/workout-session/{id}', [WorkoutSessionController::class, 'delete']);
});
