<?php

namespace App\Repositories\Eloquent;

use App\Models\Exercise;
use App\Repositories\Contracts\ExerciseRepositoryInterface;
use Illuminate\Support\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class ExerciseRepository extends BaseRepository implements ExerciseRepositoryInterface
{
    public function model()
    {
        return Exercise::class;
    }

    public function list(array $data): Collection {
        return Exercise::query()
            ->with(['muscleGroup:id,name', 'equipment:id,name'])
            ->when(isset($data['muscle_group_id']), fn ($q) =>
                $q->where('muscle_group_id', $data['muscle_group_id']))
            ->when(isset($data['equipment_id']), fn ($q) =>
                $q->where('equipment_id', $data['equipment_id']))
            ->get();
    }

	public function store(array $data): Exercise {
		return Exercise::create($data);
	}

	public function update(array $data): Exercise {
		$exercise = Exercise::findOrFail($data['id']);
		$exercise->update($data);

		return $exercise;
	}

    public function deleteById($id): bool {
        $exercise = Exercise::findOrFail($id);
        return (bool) $exercise->delete();


    }
}
