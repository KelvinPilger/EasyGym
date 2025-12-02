<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MuscleGroupCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => MuscleGroupResource::collection($this->collection),
        ];
    }
}
