<?php

namespace App\Repositories\Contracts;

use App\Models\WorkoutExercise;
use Illuminate\Support\Collection;

interface WorkoutExerciseRepositoryInterface
{
    public function list(array $data);
}
