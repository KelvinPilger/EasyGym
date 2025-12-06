<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Services\WorkoutService;
use Illuminate\Http\Request;
use App\Http\Resources\WorkoutResource;
use App\Http\Resources\WorkoutCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\WorkoutIndexRequest;
use App\Http\Requests\WorkoutShowRequest;
use App\Http\Requests\WorkoutStoreRequest;
use App\Http\Requests\WorkoutUpdateRequest;
use App\Http\Requests\WorkoutDeleteRequest;

class WorkoutController extends Controller
{
    public function __construct(WorkoutService $service) {
        $this->service = $service;
    }

    public function index(WorkoutIndexRequest $request) {
        $data = $this->service->list($request->validated());

        return new WorkoutCollection(
            WorkoutResource::collection($data)
        );
    }

	public function store(WorkoutStoreRequest $request) {
		$data = $this->service->store($request->validated());

		return new WorkoutResource($data);
	}

	public function update(WorkoutUpdateRequest $request) {
		$data = $this->service->update($request->validated());

		return new WorkoutResource($data);
	}

    public function delete(WorkoutDeleteRequest $request) {
        try {
			$deleted = $this->service->delete($request->validated());

			return response()->json([
				'code' => Response::HTTP_OK,
				'deleted' => $deleted,
				'message' => 'Treino excluído com sucesso!'
			]);
		} catch (ModelNotFoundException $e) {
			return response()->json([
				'code' => Response::HTTP_NOT_FOUND,
				'message' => 'Treino não encontrado!'
			], Response::HTTP_NOT_FOUND);
		} catch (Exception $e) {
			return response()->json([
				'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
				'message' => 'Erro interno, não foi possível excluir o treino.',
				'exception' => $e->getMessage()
			]);
		}
    }
}
