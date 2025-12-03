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

    public function list(array $data): Collection {
        return User::query()
            ->when(isset($data['id']), fn ($q) => $q->where('id', $data['id']))
            ->when(isset($data['email']), fn ($q) => $q->where('email', $data['email']))
            ->orderBy('id')
            ->get();
    }

    public function store(array $data): User {
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }
	
	public function update(array $data, int $id): User {
		$user = User::findOrFail($id);
		$user->fill($data);
		$user->save();
		
		return $user;
	}

    public function deleteById($id): bool {
        $user = User::findOrFail($id);
        return (bool) $user->delete();
    }
}
