<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Services\ExerciseService;
use Illuminate\Http\Request;
use App\Http\Resources\ExerciseResource;
use App\Http\Resources\ExerciseCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ExerciseIndexRequest;
use App\Http\Requests\ExerciseStoreRequest;
use App\Http\Requests\ExerciseUpdateRequest;
use App\Http\Requests\ExerciseDeleteRequest;


class ExerciseController extends Controller
{
    public function __construct(ExerciseService $service) {
        $this->service = $service;
    }

    public function index(ExerciseIndexRequest $request) {
        $data = $this->service->list($request->validated());

        return new ExerciseCollection (
            ExerciseResource::collection($data)
        );
    }

	// public function show() {}

	public function store(ExerciseStoreRequest $request) {
		$data = $this->service->store($request->validated());

		return new ExerciseResource($data);
	}

	public function update(ExerciseUpdateRequest $request) {
		$data = $this->service->update($request->validated());

		return new ExerciseResource($data);
	}

    public function delete(ExerciseDeleteRequest $request) {
        try {
			$deleted = $this->service->delete($request->validated());

			return response()->json([
				'code' => Response::HTTP_OK,
				'deleted' => $deleted,
				'message' => 'Exercício excluído com sucesso!'
			]);
		} catch (ModelNotFoundException $e) {
			return response()->json([
				'code' => Response::HTTP_NOT_FOUND,
				'message' => 'Exercício não encontrado!'
			], Response::HTTP_NOT_FOUND);
		} catch (Exception $e) {
			return response()->json([
				'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
				'message' => 'Erro interno, não foi possível excluir o exercício.',
				'exception' => $e->getMessage()
			]);
		}
    }
}
