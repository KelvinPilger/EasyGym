<?php

namespace App\Repositories\Eloquent;

use App\Models\Workout;
use App\Repositories\Contracts\WorkoutRepositoryInterface;
use Illuminate\Support\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Carbon\Carbon;

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

    public function getCompletedWorkouts(array $data): Collection
    {
        return Workout::query()
            ->join('workout_session as s', 's.workout_id', '=', 'workout.id')
            ->where('workout.user_id', $data['user_id'])
            ->whereNotNull('s.finished_at')
            ->selectRaw('
                workout.id,
                workout.workout_desc,
                MAX(s.finished_at) as finished_at,
                COUNT(s.id) as sections_made,
				workout.maximum_sections
            ')
            ->groupBy('workout.id', 'workout.workout_desc', 'workout.maximum_sections')
            ->havingRaw('COUNT(s.id) >= workout.maximum_sections')
            ->orderBy('finished_at', 'asc')
            ->get();
    }

    public function getWorkoutsWithoutSession($user_id, $days): Collection
    {
		$limit = Carbon::now()->subDays($days);
		
        return Workout::query()
            ->leftJoin('workout_session as s', 's.workout_id', '=', 'workout.id')
            ->where('workout.user_id', $user_id)
            ->selectRaw('
                workout.id,
                workout.workout_desc,
                MAX(s.finished_at) as last_workout,
                COUNT(s.id) as sections_made,
				workout.maximum_sections
            ')
            ->groupBy('workout.id', 'workout.workout_desc', 'workout.maximum_sections')
            ->havingRaw('MAX(s.finished_at) IS NULL OR MAX(s.finished_at) <= ?', [$limit])
            ->orderByRaw('MAX(s.created_at) IS NULL, MAX(s.created_at) asc')
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
