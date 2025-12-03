<?php

namespace App\Repositories\Contracts;
use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function store(array $data): User;
    public function deleteById($id): bool;
}
