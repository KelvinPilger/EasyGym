<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Services\EquipmentService;
use Illuminate\Http\Request;
use App\Http\Resources\EquipmentResource;
use App\Http\Resources\EquipmentCollection;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\EquipmentIndexRequest;
use App\Http\Requests\EquipmentStoreRequest;
use App\Http\Requests\EquipmentUpdateRequest;

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
}
