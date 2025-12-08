<?php

namespace App\Providers;

use App\Models\Equipment;
use App\Models\MuscleGroup;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\WorkoutSession;

use App\Policies\EquipmentPolicy;
use App\Policies\UserPolicy;
use App\Policies\ExercisePolicy;
use App\Policies\WorkoutPolicy;
use App\Policies\WorkoutSessionPolicy;
use App\Policies\MuscleGroupPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Equipment::class => EquipmentPolicy::class,
		MuscleGroup::class => MuscleGroupPolicy::class,
		User::class => UserPolicy::class,
		Exercise::class => ExercisePolicy::class,
		Workout::class => WorkoutPolicy::class,
		WorkoutSession::class => WorkoutSessionPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}