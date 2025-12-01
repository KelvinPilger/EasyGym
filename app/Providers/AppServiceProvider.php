<?php

namespace App\Providers;

use App\Repositories\Eloquent\EquipmentRepository;
use App\Repositories\Contracts\EquipmentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            EquipmentRepositoryInterface::class,
            EquipmentRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}