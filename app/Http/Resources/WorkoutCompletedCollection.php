<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkoutCompletedCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => WorkoutCompletedResource::collection($this->collection),
        ];
    }
}
