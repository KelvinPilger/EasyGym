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


class UserController extends Controller
{
    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function index(UserIndexRequest $request) {
        $data = $this->service->list($request->validated());

        return new UserCollection(
            UserResource::collection($data)
        );

    }

    public function store(UserStoreRequest $request) {
        $data = $this->service->store($request->validated());

        return new UserResource($data);
    }

    public function update(UserUpdateRequest $request) {
        $data = $this->service->update($request->validated());

        return new UserResource($data);
    }

    public function delete(UserDeleteRequest $request) {
        try {
            $deleted = $this->service->delete($request->validated());

			return response()->json([
				'code' => Response::HTTP_OK,
				'deleted' => $deleted,
				'message' => 'Usuário excluído com sucesso!'
			]);
		} catch (ModelNotFoundException $e) {
			return response()->json([
				'code' => Response::HTTP_NOT_FOUND,
				'message' => 'Usuário não encontrado!'
			], Response::HTTP_NOT_FOUND);
		} catch (Exception $e) {
			return response()->json([
				'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
				'message' => 'Erro interno, não foi possível excluir o usuário.',
				'exception' => $e->getMessage()
			]);
        }
    }
}
