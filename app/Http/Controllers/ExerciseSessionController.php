<?php

namespace App\Http\Controllers;

use App\Models\ExerciseSession;
use App\Services\ExerciseSessionService;
use Illuminate\Http\Request;
use App\Http\Resources\ExerciseSessionResource;
use App\Http\Resources\ExerciseSessionCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ExerciseSessionIndexRequest;
use App\Http\Requests\ExerciseSessionStoreRequest;
use App\Http\Requests\ExerciseSessionUpdateRequest;
use App\Http\Requests\ExerciseSessionDeleteRequest;

class ExerciseSessionController extends AbstractController
{
    public function __construct(ExerciseSessionService $service) {
        $this->service = $service;
    }

    protected function service() {
		return $this->service;
	}

	protected function resource() {
		return ExerciseSessionResource::class;
	}

	protected function collection() {
		return ExerciseSessionCollection::class;
	}

    public function index(ExerciseSessionIndexRequest $request) {
        return parent::abstractIndex($request);
    }

    public function store(ExerciseSessionStoreRequest $request) {
        return parent::abstractStore($request);
    }
}
