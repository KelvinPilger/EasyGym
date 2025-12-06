<?php

namespace App\Repositories\Eloquent;

use App\Models\WorkoutSession;
use App\Repositories\Contracts\WorkoutSessionRepositoryInterface;
use Illuminate\Support\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class WorkoutSessionRepository extends BaseRepository implements WorkoutSessionRepositoryInterface
{
    public function model()
    {
        return WorkoutSession::class;
    }

    public function list(array $data): Collection {
        return WorkoutSession::query()
            ->with('workout:id,workout_desc')
            ->when(isset($data['workout_id']), fn ($q) =>
                $q->where('workout_id', $data['workout_id']))
            ->orderBy('id')
            ->get();
    }

    public function store(array $data): WorkoutSession {
        return WorkoutSession::create($data);
    }

    public function update(array $data): WorkoutSession {
        $workoutSession = WorkoutSession::findOrFail($data['id']);
        $workoutSession->update($data);
        return $workoutSession;
    }

    public function deleteById($id): bool {
        $workoutSession = WorkoutSession::findOrFail($id);
        return (bool) $workoutSession->delete();
    }
}
