<?php

namespace App\Repositories\Contracts;

use App\Models\WorkoutSession;
use Illuminate\Support\Collection;

interface WorkoutSessionRepositoryInterface
{
    public function index(array $data): Collection;
    public function show($id): WorkoutSession;
    public function store(array $data): WorkoutSession;
    public function update(array $data): WorkoutSession;
    public function deleteById($id): bool;
}
