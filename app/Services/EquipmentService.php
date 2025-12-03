<?php

namespace App\Services;

use App\Repositories\Contracts\EquipmentRepositoryInterface;
use App\Models\Equipment;
use Illuminate\Support\Collection;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EquipmentService
{
	public function __construct(EquipmentRepositoryInterface $repository) {
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

    public function store(array $data): Equipment {
        try {
            return $this->repository->store($data);
        } catch(ModelNotFoundException $e) {
			throw $e;
		} catch(Throwable $e) {
            throw $e;
        }
    }

    public function update(array $data): Equipment {
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
