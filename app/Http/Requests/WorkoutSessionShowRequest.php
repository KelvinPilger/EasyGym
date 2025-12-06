<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkoutSessionShowRequest extends FormRequest
{
    public function validationData(): array
    {
        $data = array_merge($this->all(), [
            'id' => $this->route('id'),
        ]);

        return $data;
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID da sessão de treino deve ser informado.',
            'id.integer' => 'O ID da sessão de treino deve ser um valor inteiro.',
            'id.exists' => 'A sessão de treino informado não foi encontrada.'
        ];
    }


    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:workout_session,id']
        ];
    }
}
