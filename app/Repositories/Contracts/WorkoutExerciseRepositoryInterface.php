<?php

namespace App\Repositories\Contracts;

use App\Models\WorkoutExercise;
use Illuminate\Support\Collection;

interface WorkoutExerciseRepositoryInterface
{
    public function index(array $data): Collection;
	public function store(array $data): WorkoutExercise;
    public function update(array $data): WorkoutExercise;
    public function deleteById($id): bool;
}
