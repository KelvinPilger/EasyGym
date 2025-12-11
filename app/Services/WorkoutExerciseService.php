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

    public function index(array $data): Collection {
        try {
            return $this->repository->index($data);
        } catch(ModelNotFoundException $e) {
			throw $e;
		} catch(Throwable $e) {
            throw $e;
        }
    }

	public function store(array $data): WorkoutExercise {
        try {
            return $this->repository->store($data);
        } catch(ModelNotFoundException $e) {
			throw $e;
		} catch(Throwable $e) {
            throw $e;
        }
    }

    public function update(array $data): WorkoutExercise {
        try {
            return $this->repository->update($data);
        } catch(ModelNotFoundException $e) {
			throw $e;
		} catch(Throwable $e) {
            throw $e;
        }
    }

    public function deleteById(array $data): bool {
        try {
            $id = (int) $data['id'];
            return $this->repository->deleteById($id);
        } catch(ModelNotFoundException $e) {
			throw $e;
		} catch(Throwable $e) {
            throw $e;
        }
    }
}
