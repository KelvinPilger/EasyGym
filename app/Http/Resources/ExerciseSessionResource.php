<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseSessionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'workout_session' => new WorkoutSessionResource($this->whenLoaded('workoutSession')),
            'workout_exercise' => new WorkoutExerciseResource($this->whenLoaded('workoutExercise')),
            'picked_weight' => $this->picked_weight,
            'series_made' => $this->series_made,
            'repetitions_total' => $this->repetitions_total,
            'interval_made' => $this->interval_made,
            'rpe' => $this->rpe,
            'pain_level' => $this->pain_level,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
