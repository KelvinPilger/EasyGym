<?php

namespace App\Services;


use App\Repositories\Contracts\ExerciseSessionRepositoryInterface;
use App\Models\ExerciseSession;
use Illuminate\Support\Collection;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ExerciseSessionService
{
    public function __construct(ExerciseSessionRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function index(array $data): Collection {
        try {
            return $this->repository->index($data);
        } catch(Throwable $e) {
            throw $e;
        }
    }

    public function store(array $data): ExerciseSession {
        try {
            return $this->repository->store($data);
        } catch(Throwable $e) {
            throw $e;
        }
    }

    public function update(array $data): ExerciseSession {
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
