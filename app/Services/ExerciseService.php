<?php

namespace App\Services;

use App\Repositories\Contracts\ExerciseRepositoryInterface;
use App\Models\Exercise;
use Illuminate\Support\Collection;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ExerciseService
{
    public function __construct(ExerciseRepositoryInterface $repository) {
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

    public function delete(array $data) {
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
