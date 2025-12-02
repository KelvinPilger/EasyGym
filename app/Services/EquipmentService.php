<?php

namespace App\Services;

use App\Repositories\Contracts\EquipmentRepositoryInterface;
use App\Models\Equipment;
use Illuminate\Support\Collection;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
/**
 * Class EquipmentService.
 */
class EquipmentService
{
	public function __construct(EquipmentRepositoryInterface $repository) {
		$this->repository = $repository;
	}

	public function list(array $data): Collection {
		return $this->repository->list($data);
	}

    public function store(array $data): Equipment {
        return $this->repository->store($data);
    }

    public function update(array $data): Equipment {
        return $this->repository->update($data);
    }
	
	public function delete(array $data): bool {
		try {
			$id = (int) $data['id'];
			return $this->repository->deleteById($id);
		} catch(ModelNotFoundException $e) {
			throw $e;
		}
	}
}
