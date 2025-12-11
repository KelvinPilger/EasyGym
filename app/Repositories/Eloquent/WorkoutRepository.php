<?php

namespace App\Repositories\Eloquent;

use App\Models\Workout;
use App\Repositories\Contracts\WorkoutRepositoryInterface;
use Illuminate\Support\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class WorkoutRepository extends BaseRepository implements WorkoutRepositoryInterface
{
    public function model()
    {
        return Workout::class;
    }

    public function index(array $data): Collection {
        return Workout::query()
            ->with('user')
            ->when(isset($data['user_id']), fn ($q) =>
                $q->where('user_id', $data['user_id']))
            ->when(isset($data['id']), fn ($q) =>
                $q->where('id', $data['id']))
			->orderBy('id')
            ->get();
    }

	public function store(array $data): Workout {
		return Workout::create($data);
	}

	public function update(array $data): Workout {
		$workout = Workout::findOrFail($data['id']);
		$workout->update($data);

		return $workout;
	}

    public function deleteById($id): bool {
        $workout = Workout::findOrFail($id);
        return (bool) $workout->delete();
    }
}
