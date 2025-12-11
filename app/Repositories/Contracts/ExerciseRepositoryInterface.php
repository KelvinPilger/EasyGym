<?php

namespace App\Repositories\Contracts;
use App\Models\Exercise;
use Illuminate\Support\Collection;

interface ExerciseRepositoryInterface
{
    public function index(array $data): Collection;
    public function show($id): Exercise;
	public function store(array $data): Exercise;
	public function update(array $data): Exercise;
    public function deleteById($id): bool;
}
