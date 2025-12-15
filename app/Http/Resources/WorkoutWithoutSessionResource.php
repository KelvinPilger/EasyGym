<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutWithoutSessionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'workout_desc' => $this->workout_desc,
            'last_workout' => $this->last_workout ?: 'Nenhuma sessão de treino efetuada.',
            'sections_made' => $this->sections_made,
			'maximum_sections' => $this->maximum_sections,
        ];
    }
}
