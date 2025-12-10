<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseSummaryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'exercise_desc' => $this->exercise_desc,
            'video_url' => $this->video_url,
            'image_url' => $this->image_url
        ];
    }
}
