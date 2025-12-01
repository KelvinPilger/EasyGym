<?php

namespace App\Services;

use App\Repositories\Contracts\EquipmentRepositoryInterface;
use Illuminate\Support\Collection;
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
}
