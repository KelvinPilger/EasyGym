<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutCompletedResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'workout_desc' => $this->workout_desc,
            'finished_at' => $this->finished_at,
            'sections_made' => $this->sections_made,
        ];
    }
}
