<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkoutCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => WorkoutResource::collection($this->collection),
        ];
    }
}
