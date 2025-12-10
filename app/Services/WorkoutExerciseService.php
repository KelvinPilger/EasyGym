<?php

namespace App\Services;

use App\Repositories\Contracts\WorkoutExerciseRepositoryInterface;
use App\Models\WorkoutExercise;
use Illuminate\Support\Collection;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WorkoutExerciseService
{
    public function __construct(WorkoutExerciseRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function list(array $data): Collection {
        try {
            return $this->repository->list($data);
        } catch(ModelNotFoundException $e) {
			throw $e;
		} catch(Throwable $e) {
            throw $e;
        }
    }
	
	public function store(array $data): Collection {
        try {
            return $this->repository->store($data);
        } catch(ModelNotFoundException $e) {
			throw $e;
		} catch(Throwable $e) {
            throw $e;
        }
    }
}
