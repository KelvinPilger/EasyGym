<?php

namespace App\Repositories\Contracts;

use App\Models\ExerciseSession;
use Illuminate\Support\Collection;

interface ExerciseSessionRepositoryInterface
{
    public function index(array $data): Collection;
    public function store(array $data): ExerciseSession;
}
