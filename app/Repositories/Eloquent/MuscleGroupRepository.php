<?php

namespace App\Repositories\Eloquent;

use App\Models\MuscleGroup;
use App\Repositories\Contracts\MuscleGroupRepositoryInterface;
use Illuminate\Support\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class MuscleGroupRepository.
 */
class MuscleGroupRepository extends BaseRepository implements MuscleGroupRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return MuscleGroup::class;
    }

    public function index(array $data): Collection {
        return MuscleGroup::query()
            ->when(isset($data['id']), fn ($q) => $q->where('id', $data['id']))
            ->when(isset($data['name']), fn ($q) => $q->where('name', 'like', '%'.$data['name'].'%'))
            ->orderBy('id')
            ->get();
    }

    public function store(array $data): MuscleGroup {
        return MuscleGroup::create($data);
    }

    public function update(array $data): MuscleGroup {
        $muscleGroup = MuscleGroup::findOrFail($data['id']);
        $muscleGroup->update($data);
        return $muscleGroup;
    }

    public function deleteById($id): bool {
        $muscleGroup = MuscleGroup::findOrFail($id);
        return (bool) $muscleGroup->delete();
    }
}
