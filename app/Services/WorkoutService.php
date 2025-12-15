<?php

namespace App\Services;

use App\Repositories\Contracts\WorkoutRepositoryInterface;
use App\Models\Workout;
use Illuminate\Support\Collection;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WorkoutService
{
    public function __construct(WorkoutRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function index(array $data) {
        try {
            return $this->repository->index($data);
        } catch(ModelNotFoundException $e) {
			throw $e;
		} catch(Throwable $e) {
            throw $e;
        }
    }

    public function getCompletedWorkouts(array $data) {
        try {
            return $this->repository->getCompletedWorkouts($data);
        } catch(Throwable $e) {
            throw $e;
        }
    }

    public function getWorkoutsWithoutSession(array $data) {
        try {
            $user_id = (int) $data['user_id'];
            $days = (int) $data['days'];

            return $this->repository->getWorkoutsWithoutSession($user_id, $days);
        } catch(Throwable $e) {
            throw $e;
        }
    }

	public function store(array $data) {
		try {
            return $this->repository->store($data);
        } catch(ModelNotFoundException $e) {
			throw $e;
		} catch(Throwable $e) {
            throw $e;
        }
	}

	public function update(array $data) {
		try {
            return $this->repository->update($data);
        } catch(ModelNotFoundException $e) {
			throw $e;
		} catch(Throwable $e) {
            throw $e;
        }
	}

    public function delete(array $data): bool {
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
