<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Services\ExerciseService;
use Illuminate\Http\Request;
use App\Http\Resources\ExerciseResource;
use App\Http\Resources\ExerciseCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ExerciseIndexRequest;
use App\Http\Requests\ExerciseShowRequest;
use App\Http\Requests\ExerciseStoreRequest;
use App\Http\Requests\ExerciseUpdateRequest;
use App\Http\Requests\ExerciseDeleteRequest;


class ExerciseController extends AbstractController
{
    public function __construct(ExerciseService $service) {
        $this->service = $service;
    }

	protected function service()
    {
        return $this->service;
    }

    protected function resource()
    {
        return ExerciseResource::class;
    }

    protected function collection()
    {
        return ExerciseCollection::class;
    }

	public function index(ExerciseIndexRequest $request) {
		return parent::abstractIndex($request);
	}

	public function store(ExerciseStoreRequest $request) {
		return parent::abstractStore($request);
	}

	public function update(ExerciseUpdateRequest $request) {
		return parent::abstractUpdate($request);
	}

	public function show(ExerciseShowRequest $request) {
		$data = $this->service->show($request->validated());

        return new ExerciseResource ($data);
    }

    public function delete(ExerciseDeleteRequest $request) {
        return parent::abstractDelete($request);
    }
}
