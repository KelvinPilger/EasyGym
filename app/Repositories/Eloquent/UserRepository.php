<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function store(array $data): User {
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

    public function deleteById($id): bool {
        $user = User::findOrFail($id);
        return (bool) $user->delete();
    }
}
