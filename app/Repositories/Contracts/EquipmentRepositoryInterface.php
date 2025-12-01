<?php

namespace App\Repositories\Contracts;
use Illuminate\Support\Collection;

interface EquipmentRepositoryInterface
{
    public function list(array $data): Collection;
}
