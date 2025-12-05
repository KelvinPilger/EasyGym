<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseDeleteRequest extends FormRequest
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
            'id.required' => 'O ID do exercício deve ser informado.',
            'id.integer' => 'O ID do exercício deve ser um valor inteiro.',
            'id.exists' => 'O ID do exercício informado não foi encontrado.'
        ];
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:exercise,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
