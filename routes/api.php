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
use App\Http\Controllers\WorkoutExerciseController;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\WorkoutSession;
use App\Models\Equipment;
use App\Models\MuscleGroup;
use App\Models\WorkoutExercise;


require __DIR__.'/api/auth.php';

Route::middleware('auth:sanctum')->group(function () {
	require __DIR__.'/api/equipment.php';
    require __DIR__.'/api/muscle-group.php';
    require __DIR__.'/api/user.php';
    require __DIR__.'/api/exercise.php';
    require __DIR__.'/api/workout.php';
    require __DIR__.'/api/workout-session.php';
    require __DIR__.'/api/workout-exercise.php';
});
