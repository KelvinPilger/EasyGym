<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'muscle_group_id' => ['integer', 'sometimes'],
            'equipment_id' => ['integer', 'sometimes']
        ];
    }
}
