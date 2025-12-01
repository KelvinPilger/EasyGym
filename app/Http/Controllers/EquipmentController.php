<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Services\EquipmentService;
use Illuminate\Http\Request;
use App\Http\Resources\EquipmentResource;
use App\Http\Resources\EquipmentCollection;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\EquipmentIndexRequest;

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
}
