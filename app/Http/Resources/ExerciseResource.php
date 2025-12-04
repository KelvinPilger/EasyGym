<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'exercise_desc' => $this->exercise_desc,
            'muscle_group' => new MuscleGroupResource($this->whenLoaded('muscleGroup')),
            'equipment' => new EquipmentResource($this->whenLoaded('equipment')),
            'video_url' => $this->video_url,
            'image_url' => $this->image_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
