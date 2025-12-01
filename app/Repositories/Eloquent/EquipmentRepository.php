<?php

namespace App\Repositories\Eloquent;

use App\Models\Equipment;
use App\Repositories\Contracts\EquipmentRepositoryInterface;
use Illuminate\Support\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class EquipmentRepository extends BaseRepository implements EquipmentRepositoryInterface
{
    public function model()
    {
        return Equipment::class;
    }

    public function list(array $data): Collection
    {
        return Equipment::query()
            ->when(isset($data['id']), fn ($q) => $q->where('id', $data['id']))
            ->when(isset($data['name']), fn ($q) => $q->where('name', 'like', '%'.$data['name'].'%'))
            ->get();
    }
}
