<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserIndexRequest;
use App\Http\Requests\UserUpdateRequest;


class UserController extends AbstractController
{
    public function __construct(UserService $service) {
        $this->service = $service;
    }

	protected function service() {
		return $this->service;
	}

	protected function resource() {
		return UserResource::class;
	}

	protected function collection() {
		return UserCollection::class;
	}

    public function index(UserIndexRequest $request) {
		return parent::abstractIndex($request);
    }

    public function store(UserStoreRequest $request) {
        return parent::abstractStore($request);
    }

    public function update(UserUpdateRequest $request) {
        return parent::abstractUpdate($request);
    }

    public function delete(UserDeleteRequest $request) {
        return parent::abstractDelete($request);
    }
}
