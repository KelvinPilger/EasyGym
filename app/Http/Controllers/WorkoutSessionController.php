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

class WorkoutSessionController extends AbstractController
{
    public function __construct(WorkoutSessionService $service) {
        $this->service = $service;
    }

	protected function service() {
		return $this->service;
	}

	protected function resource() {
		return WorkoutSessionResource::class;
	}

	protected function collection() {
		return WorkoutSessionCollection::class;
	}

    public function index(WorkoutSessionIndexRequest $request) {
        return parent::abstractIndex($request);
    }

    public function show(WorkoutSessionShowRequest $request) {
        $data = $this->service->show($request->validated());

        return new WorkoutSessionResource($data);
    }

    public function store(WorkoutSessionStoreRequest $request) {
        return parent::abstractStore($request);
    }

    public function update(WorkoutSessionUpdateRequest $request) {
        return parent::abstractUpdate($request);
    }

    public function delete(WorkoutSessionDeleteRequest $request) {
        return parent::abstractDelete($request);
    }
}
