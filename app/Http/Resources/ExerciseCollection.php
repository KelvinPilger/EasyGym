<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ExerciseCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => ExerciseResource::collection($this->collection),
        ];
    }
}
