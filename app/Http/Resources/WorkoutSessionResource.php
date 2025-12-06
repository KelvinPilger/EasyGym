<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutSessionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'workout_id' => new WorkoutSummaryResource($this->whenLoaded('workout')),
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at
        ];
    }
}
