<?php

namespace App\Providers;

use App\Repositories\Eloquent\EquipmentRepository;
use App\Repositories\Contracts\EquipmentRepositoryInterface;
use App\Repositories\Eloquent\MuscleGroupRepository;
use App\Repositories\Contracts\MuscleGroupRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
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
    }

    public function boot(): void
    {
        //
    }
}
