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

    public function list(array $data) {
        try {
            return $this->repository->list($data);
        } catch(ModelNotFoundException $e) {
			throw $e;
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
}
