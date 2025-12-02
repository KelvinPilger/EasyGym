<?php

namespace App\Http\Controllers;

use App\Models\MuscleGroup;
use App\Services\MuscleGroupService;
use Illuminate\Http\Request;
use App\Http\Resources\MuscleGroupResource;
use App\Http\Resources\MuscleGroupCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MuscleGroupIndexRequest;
use App\Http\Requests\MuscleGroupStoreRequest;
use App\Http\Requests\MuscleGroupUpdateRequest;
use App\Http\Requests\MuscleGroupDeleteRequest;



class MuscleGroupController extends Controller
{
    public function __construct(MuscleGroupService $service) {
        $this->service = $service;
    }

    public function index(MuscleGroupIndexRequest $request) {
        $data = $this->service->list($request->validated());

        return new MuscleGroupCollection (
            MuscleGroupResource::collection($data)
        );
    }

    public function store(MuscleGroupStoreRequest $request) {
        $data = $this->service->store($request->validated());

        return new MuscleGroupResource($data);
    }

    public function update(MuscleGroupUpdateRequest $request) {
        $data = $this->service->update($request->validated());

        return new MuscleGroupResource($data);
    }

    public function delete(MuscleGroupDeleteRequest $request) {
        try {
            $deleted = $this->service->delete($request->validated());

			return response()->json([
				'code' => Response::HTTP_OK,
				'deleted' => $deleted,
				'message' => 'Grupo muscular excluído com sucesso!'
			]);
		} catch (ModelNotFoundException $e) {
			return response()->json([
				'code' => Response::HTTP_NOT_FOUND,
				'message' => 'Grupo muscular não encontrado!'
			], Response::HTTP_NOT_FOUND);
		} catch (Exception $e) {
			return response()->json([
				'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
				'message' => 'Erro interno, não foi possível excluir o grupo muscular.',
				'exception' => $e->getMessage()
			]);
        }
    }
}
