<?php

namespace App\Providers;

use App\Repositories\Eloquent\EquipmentRepository;
use App\Repositories\Contracts\EquipmentRepositoryInterface;
use App\Repositories\Eloquent\MuscleGroupRepository;
use App\Repositories\Contracts\MuscleGroupRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Eloquent\ExerciseRepository;
use App\Repositories\Contracts\ExerciseRepositoryInterface;
use App\Repositories\Eloquent\WorkoutRepository;
use App\Repositories\Contracts\WorkoutRepositoryInterface;
use App\Repositories\Eloquent\WorkoutSessionRepository;
use App\Repositories\Contracts\WorkoutSessionRepositoryInterface;
use App\Repositories\Eloquent\WorkoutExerciseRepository;
use App\Repositories\Contracts\WorkoutExerciseRepositoryInterface;
use App\Repositories\Eloquent\ExerciseSessionRepository;
use App\Repositories\Contracts\ExerciseSessionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            EquipmentRepositoryInterface::class,
            EquipmentRepository::class
        );

        $this->app->bind(
            MuscleGroupRepositoryInterface::class,
            MuscleGroupRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            ExerciseRepositoryInterface::class,
            ExerciseRepository::class
        );

        $this->app->bind(
            WorkoutRepositoryInterface::class,
            WorkoutRepository::class
        );

        $this->app->bind(
            WorkoutSessionRepositoryInterface::class,
            WorkoutSessionRepository::class
        );

        $this->app->bind(
            WorkoutExerciseRepositoryInterface::class,
            WorkoutExerciseRepository::class
        );


        $this->app->bind(
            ExerciseSessionRepositoryInterface::class,
            ExerciseSessionRepository::class
        );
    }

    public function boot(): void
    {
    }
}
