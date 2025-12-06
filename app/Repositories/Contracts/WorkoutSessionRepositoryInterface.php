<?php

namespace App\Repositories\Contracts;

use App\Models\WorkoutSession;
use Illuminate\Support\Collection;

interface WorkoutSessionRepositoryInterface
{
    public function list(array $data): Collection;
    public function store(array $data): WorkoutSession;
    public function update(array $data): WorkoutSession;
    public function deleteById($id): bool;
}
