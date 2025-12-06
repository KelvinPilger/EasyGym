<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkoutSessionUpdateRequest extends FormRequest
{
    public function validationData(): array
    {
        $data = array_merge($this->all(), [
            'id' => $this->route('id'),
        ]);

        return $data;
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array {
        return [
            'id.required' => 'O ID da sessão de treino é de preenchimento obrigatório.',
            'id.integer' => 'O ID da sessão de treino é do tipo integer.',
            'id.exists' => 'A sessão de treino informada não é existente.',
            'workout_id.integer' => 'O tipo do ID do treino deve ser integer.',
            'started_at.date_format:Y-m-d H:i:s' => 'O tipo do início da sessão de treino deve ser timestamp.',
            'finished_at.date_format:Y-m-d H:i:s' => 'O tipo do fim da sessão de trieno deve ser timestamp.',
        ];
    }

    public function rules(): array
    {
        return [
			'id' => ['required', 'integer', 'exists:workout_session,id'],
            'workout_id' => ['sometimes', 'integer'],
            'started_at' => ['sometimes', 'date_format:Y-m-d H:i:s'],
            'finished_at' => ['sometimes', 'date_format:Y-m-d H:i:s']
        ];
    }
}
