<?php

namespace App\Repositories\Eloquent;

use App\Models\ExerciseSession;
use App\Repositories\Contracts\ExerciseSessionRepositoryInterface;
use Illuminate\Support\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class ExerciseSessionRepository extends BaseRepository implements ExerciseSessionRepositoryInterface
{

    public function model()
    {
        return ExerciseSession::class;
    }

    public function index(array $data): Collection {
        return ExerciseSession::query()
            ->with(['workoutSession', 'workoutExercise'])
            ->orderBy('id')
            ->get();
    }

    public function store(array $data): ExerciseSession {
        return ExerciseSession::create($data);
    }

    public function update(array $data): ExerciseSession {
        $exerciseSession = ExerciseSession::findOrFail($data['id']);
        $exerciseSession->update($data);
        return $exerciseSession;
    }

    public function deleteById($id): bool {
        $exerciseSession = ExerciseSession::findOrFail($id);
        return (bool) $exerciseSession->delete();
    }
}
