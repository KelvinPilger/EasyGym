<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutExerciseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'workout_id' => new WorkoutSummaryResource($this->whenLoaded('workout')),
            'exercise_id' => new ExerciseSummaryResource($this->whenLoaded('exercise')),
            'section_label' => $this->section_label,
            'repetitions' => $this->repetitions,
            'series' => $this->series,
            'interval' => $this->interval,
            'observation' => $this->observation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
