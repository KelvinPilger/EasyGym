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



class MuscleGroupController extends AbstractController
{
    public function __construct(MuscleGroupService $service) {
        $this->service = $service;
    }

	protected function service() {
		return $this->service;
	}
	protected function resource() {
		return MuscleGroupResource::class;
	}

	protected function collection() {
		return MuscleGroupCollection::class;
	}

    public function index(MuscleGroupIndexRequest $request) {
		return parent::abstractIndex($request);
    }

    public function store(MuscleGroupStoreRequest $request) {
        return parent::abstractStore($request);
    }

    public function update(MuscleGroupUpdateRequest $request) {
        return parent::abstractUpdate($request);
    }

    public function delete(MuscleGroupDeleteRequest $request) {
        return parent::abstractDelete($request);
    }
}
