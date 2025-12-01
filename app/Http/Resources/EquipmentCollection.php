<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EquipmentCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => EquipmentResource::collection($this->collection),
        ];
    }
}