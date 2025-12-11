<?php

namespace App\Repositories\Eloquent;

use App\Models\WorkoutExercise;
use App\Repositories\Contracts\WorkoutExerciseRepositoryInterface;
use Illuminate\Support\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class WorkoutExerciseRepository extends BaseRepository implements WorkoutExerciseRepositoryInterface
{
    public function model()
    {
        return WorkoutExercise::class;
    }

    public function index(array $data): Collection {
        return WorkoutExercise::query()
            ->with(['workout:id,workout_desc', 'exercise:id,exercise_desc'])
            ->when(isset($data['workout_id']), fn ($q) =>
                $q->where('workout_id', $data['workout_id']))
            ->when(isset($data['exercise_id']), fn ($q) =>
                $q->where('exercise_id', $data['exercise_id']))
            ->orderBy('id')
            ->get();
    }

	public function store(array $data): WorkoutExercise {
		return WorkoutExercise::create($data);
	}
}
