<?php

namespace App\Repositories\Contracts;
use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function index(array $data): Collection;
    public function store(array $data): User;
	public function update(array $data, int $id): User;
    public function deleteById($id): bool;
}
