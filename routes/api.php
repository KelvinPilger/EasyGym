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
use App\Models\User;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\WorkoutSession;
use App\Models\Equipment;
use App\Models\MuscleGroup;

Route::post('/login', [AuthApiController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthApiController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/equipment', [EquipmentController::class, 'index']);
    Route::post('/equipment', [EquipmentController::class, 'store'])
		->middleware('can:create,' . Equipment::class);
    Route::put('/equipment/{id}', [EquipmentController::class, 'update'])
		->middleware('can:update,' . Equipment::class);
    Route::delete('/equipment/{id}', [EquipmentController::class, 'delete'])
		->middleware('can:delete,' . Equipment::class);

    Route::get('muscle-group', [MuscleGroupController::class, 'index']);
    Route::post('muscle-group', [MuscleGroupController::class, 'store'])
		->middleware('can:create,' . MuscleGroup::class);
    Route::put('muscle-group/{id}', [MuscleGroupController::class, 'update'])
		->middleware('can:update,' . MuscleGroup::class);
    Route::delete('muscle-group/{id}', [MuscleGroupController::class, 'delete'])
		->middleware('can:delete,' . MuscleGroup::class);

    Route::get('/user', [UserController::class, 'index'])
		->middleware('can:viewAny,' . User::class);
	Route::post('/user', [UserController::class, 'store'])
		->middleware('can:create,' . User::class);
    Route::patch('/user/{id}', [UserController::class, 'update'])
		->middleware('can:update,' . User::class);
    Route::put('/user/{id}', [UserController::class, 'update'])
		->middleware('can:update,' . User::class);
    Route::delete('user/{id}', [UserController::class, 'delete'])
		->middleware('can:delete,' . User::class);

    Route::get('/exercise', [ExerciseController::class, 'index']);
    Route::get('/exercise/{id}', [ExerciseController::class, 'show']);
    Route::post('/exercise', [ExerciseController::class, 'store'])
		->middleware('can:create,' . Exercise::class);
    Route::put('/exercise/{id}', [ExerciseController::class, 'update'])
		->middleware('can:update,' . Exercise::class);
    Route::delete('/exercise/{id}', [ExerciseController::class, 'delete'])
		->middleware('can:delete,' . Exercise::class);

    Route::get('/workout/{user_id}', [WorkoutController::class, 'index']);
	Route::post('/workout', [WorkoutController::class, 'store'])
        ->middleware('can:create,' . Workout::class);
	Route::put('/workout/{id}', [WorkoutController::class, 'update'])
        ->middleware('can:update,' . Workout::class);
    Route::delete('/workout/{id}', [WorkoutController::class, 'delete'])
        ->middleware('can:delete,' . Workout::class);

    Route::get('/workout-session', [WorkoutSessionController::class, 'index']);
    Route::get('/workout-session/{id}', [WorkoutSessionController::class, 'show']);
	Route::post('/workout-session', [WorkoutSessionController::class, 'store']);
	Route::put('/workout-session/{id}', [WorkoutSessionController::class, 'update']);
    Route::delete('/workout-session/{id}', [WorkoutSessionController::class, 'delete'])
        ->middleware('can:delete,' . WorkoutSession::class);
});
