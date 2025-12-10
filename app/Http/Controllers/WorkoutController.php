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

class WorkoutController extends AbstractController
{
    public function __construct(WorkoutService $service) {
        $this->service = $service;
    }
	
	protected function service() {
		return $this->service;
	}
	
	protected function resource() {
		return WorkoutResource::class;
	}
	
	protected function collection() {
		return WorkoutCollection::class;
	}

    public function index(WorkoutIndexRequest $request) {
        return parent::abstractIndex($request);
    }

	public function store(WorkoutStoreRequest $request) {
		return parent::abstractStore($request);
	}

	public function update(WorkoutUpdateRequest $request) {
		return parent::abstractUpdate($request);
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
