<?php

namespace App\Repositories\Contracts;

use App\Models\WorkoutExercise;
use Illuminate\Support\Collection;

interface WorkoutExerciseRepositoryInterface
{
    public function index(array $data): Collection;
	public function store(array $data): WorkoutExercise;
}
