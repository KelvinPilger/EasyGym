<?php

namespace App\Repositories\Contracts;
use App\Models\Equipment;
use Illuminate\Support\Collection;

interface EquipmentRepositoryInterface
{
    public function list(array $data): Collection;
    public function store(array $data): Equipment;
    public function update(array $data): Equipment;
}
