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

class EquipmentController extends AbstractController
{
    public function __construct(EquipmentService $service) {
        $this->service = $service;
    }

    protected function service()
    {
        return $this->service;
    }

    protected function resource()
    {
        return EquipmentResource::class;
    }

    protected function collection()
    {
        return EquipmentCollection::class;
    }
	
	public function index(EquipmentIndexRequest $request) {
		return parent::abstractIndex($request);
	}
	
	public function store(EquipmentStoreRequest $request) {
		return parent::abstractStore($request);
	}
	
	public function update(EquipmentUpdateRequest $request) {
		return parent::abstractUpdate($request);
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
