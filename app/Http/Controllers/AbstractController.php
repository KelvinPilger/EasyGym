<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
	abstract protected function service();
    abstract protected function resource();
    abstract protected function collection();

	protected function abstractIndex(FormRequest $request) {
        $data = $this->service()->index($request->validated());

        $resource = $this->resource();
        $collection = $this->collection();

        return new $collection(
            $resource::collection($data)
        );
    }

	protected function abstractStore(FormRequest $request) {
		$data = $this->service()->store($request->validated());

		$resource = $this->resource();

		return new $resource($data);
	}

	protected function abstractUpdate(FormRequest $request) {
		$data = $this->service()->update($request->validated());

		$resource = $this->resource();

		return new $resource($data);
	}

    protected function abstractDelete(FormRequest $request) {
        try {
			$deleted = $this->service()->deleteById($request->validated());

			return response()->json([
				'code' => Response::HTTP_OK,
				'deleted' => $deleted,
				'message' => 'Registro excluído com sucesso!'
			]);
		} catch (ModelNotFoundException $e) {
			return response()->json([
				'code' => Response::HTTP_NOT_FOUND,
				'message' => 'Registro não encontrado!'
			], Response::HTTP_NOT_FOUND);
		} catch (Exception $e) {
			return response()->json([
				'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
				'message' => 'Erro interno, não foi possível excluir o registro.',
				'exception' => $e->getMessage()
			]);
		}
    }
}
