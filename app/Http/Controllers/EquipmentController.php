<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Services\EquipmentService;
use Illuminate\Http\Request;
use App\Http\Resources\EquipmentResource;
use App\Http\Resources\EquipmentCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\EquipmentIndexRequest;
use App\Http\Requests\EquipmentStoreRequest;
use App\Http\Requests\EquipmentUpdateRequest;
use App\Http\Requests\EquipmentDeleteRequest;

class EquipmentController extends Controller
{
    public function __construct(EquipmentService $service) {
        $this->service = $service;
    }

    public function index(EquipmentIndexRequest $request) {
        $data = $this->service->list($request->validated());

        return new EquipmentCollection(
            EquipmentResource::collection($data)
        );
    }

    public function store(EquipmentStoreRequest $request) {
        $data = $this->service->store($request->validated());

        return new EquipmentResource($data);
    }

    public function update(EquipmentUpdateRequest $request) {
        $data = $this->service->update($request->validated());

        return new EquipmentResource($data);
    }

	public function delete(EquipmentDeleteRequest $request)
	{
		try {
			$deleted = $this->service->delete($request->validated());

			return response()->json([
				'code' => Response::HTTP_OK,
				'deleted' => $deleted,
				'message' => 'Equipamento excluído com sucesso!'
			]);
		} catch (ModelNotFoundException $e) {
			return response()->json([
				'code' => Response::HTTP_NOT_FOUND,
				'message' => 'Equipamento não encontrado!'
			], Response::HTTP_NOT_FOUND);
		} catch (Exception $e) {
			return response()->json([
				'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
				'message' => 'Erro interno, não foi possível excluir o equipamento.',
				'exception' => $e->getMessage()
			]);
		}
	}
}
