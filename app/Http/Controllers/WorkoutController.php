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
use App\Http\Requests\WorkoutCompletedRequest;
use App\Http\Requests\WorkoutWithoutSessionRequest;
use App\Http\Resources\WorkoutCompletedResource;
use App\Http\Resources\WorkoutCompletedCollection;
use App\Http\Resources\WorkoutWithoutSessionResource;
use App\Http\Resources\WorkoutWithoutSessionCollection;

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

    public function getCompletedWorkouts(WorkoutCompletedRequest $request) {
        $data = $this->service->getCompletedWorkouts($request->validated());

        return new WorkoutCompletedCollection (
            WorkoutCompletedResource::collection($data)
        );
    }

    public function getWorkoutsWithoutSession(WorkoutWithoutSessionRequest $request) {
        $data = $this->service->getWorkoutsWithoutSession($request->validated());

        return new WorkoutWithoutSessionCollection (
            WorkoutWithoutSessionResource::collection($data)
        );
    }

	public function store(WorkoutStoreRequest $request) {
		return parent::abstractStore($request);
	}

	public function update(WorkoutUpdateRequest $request) {
		return parent::abstractUpdate($request);
	}

    public function delete(WorkoutDeleteRequest $request) {
        return parent::abstractDelete($request);
    }
}
