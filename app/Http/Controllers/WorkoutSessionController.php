<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSession;
use App\Services\WorkoutSessionService;
use Illuminate\Http\Request;
use App\Http\Resources\WorkoutSessionResource;
use App\Http\Resources\WorkoutSessionCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\WorkoutSessionIndexRequest;
use App\Http\Requests\WorkoutSessionShowRequest;
use App\Http\Requests\WorkoutSessionStoreRequest;
use App\Http\Requests\WorkoutSessionUpdateRequest;
use App\Http\Requests\WorkoutSessionDeleteRequest;

class WorkoutSessionController extends Controller
{
    public function __construct(WorkoutSessionService $service) {
        $this->service = $service;
    }

    public function index(WorkoutSessionIndexRequest $request) {
        $data = $this->service->list($request->validated());

        return new WorkoutSessionCollection(
            WorkoutSessionResource::collection($data)
        );
    }

    public function show(WorkoutSessionShowRequest $request) {
        $data = $this->service->show($request->validated());

        return new WorkoutSessionResource($data);
    }

    public function store(WorkoutSessionStoreRequest $request) {
        $data = $this->service->store($request->validated());

        return new WorkoutSessionResource($data);
    }

    public function update(WorkoutSessionUpdateRequest $request) {
        $data = $this->service->update($request->validated());

        return new WorkoutSessionResource($data);
    }

    public function delete(WorkoutSessionDeleteRequest $request) {
        try {
			$deleted = $this->service->delete($request->validated());

			return response()->json([
				'code' => Response::HTTP_OK,
				'deleted' => $deleted,
				'message' => 'Sessão de treino excluída com sucesso!'
			]);
		} catch (ModelNotFoundException $e) {
			return response()->json([
				'code' => Response::HTTP_NOT_FOUND,
				'message' => 'Sessão de treino não encontrada!'
			], Response::HTTP_NOT_FOUND);
		} catch (Exception $e) {
			return response()->json([
				'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
				'message' => 'Erro interno, não foi possível excluir a sessão de treino.',
				'exception' => $e->getMessage()
			]);
		}
    }
}
