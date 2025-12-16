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
}
