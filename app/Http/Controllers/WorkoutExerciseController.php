<?php

namespace App\Http\Controllers;

use App\Models\WorkoutExercise;
use App\Services\WorkoutExerciseService;
use Illuminate\Http\Request;
use App\Http\Resources\WorkoutExerciseResource;
use App\Http\Resources\WorkoutExerciseCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\WorkoutExerciseIndexRequest;
use App\Http\Requests\WorkoutExerciseShowRequest;
use App\Http\Requests\WorkoutExerciseStoreRequest;
use App\Http\Requests\WorkoutExerciseUpdateRequest;
use App\Http\Requests\WorkoutExerciseDeleteRequest;

class WorkoutExerciseController extends AbstractController
{
    public function __construct(WorkoutExerciseService $service) {
        $this->service = $service;
    }

    protected function service() {
		return $this->service;
	}

	protected function resource() {
		return WorkoutExerciseResource::class;
	}

	protected function collection() {
		return WorkoutExerciseCollection::class;
	}

    public function index(WorkoutExerciseIndexRequest $request) {
        return parent::abstractIndex($request);
    }

	public function store(WorkoutExerciseStoreRequest $request) {
		return parent::abstractStore($request);
	}

    public function update(WorkoutExerciseUpdateRequest $request) {
        return parent::abstractUpdate($request);
    }

    public function delete(WorkoutExerciseDeleteRequest $request) {
        return parent::abstractDelete($request);
    }
}
