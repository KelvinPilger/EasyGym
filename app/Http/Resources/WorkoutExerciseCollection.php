<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkoutExerciseCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => WorkoutExerciseResource::collection($this->collection),
        ];
    }
}
