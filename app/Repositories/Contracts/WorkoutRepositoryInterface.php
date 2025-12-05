<?php

namespace App\Repositories\Contracts;

use App\Models\Workout;
use Illuminate\Support\Collection;

interface WorkoutRepositoryInterface
{
    public function list(array $data): Collection;
	public function store(array $data): Workout;
}
