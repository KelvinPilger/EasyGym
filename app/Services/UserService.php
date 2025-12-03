<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{
    public function __construct(UserRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function store(array $data): User {
        try {
            return $this->repository->store($data);
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
