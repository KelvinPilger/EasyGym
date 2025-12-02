<?php

namespace App\Repositories\Contracts;

use App\Models\MuscleGroup;
use Illuminate\Support\Collection;

interface MuscleGroupRepositoryInterface
{
    public function list(array $data): Collection;
    public function store(array $data): MuscleGroup;
    public function update(array $data): MuscleGroup;
    public function deleteById($id): bool;
}
