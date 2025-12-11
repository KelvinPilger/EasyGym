<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkoutExerciseDeleteRequest extends FormRequest
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
            'id.required' => 'O ID do exercício do treino é obrigatório.',
            'id.integer' => 'O ID do exercício do treino deve ser do tipo integer.',
            'id.exists' => 'O ID informado não é existente.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array {
        return [
            'id' => ['required', 'integer', 'exists:workout_exercise,id'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'code'    => 422,
                'message' => 'Erro de validação.',
                'errors'  => $validator->errors(),
            ], 422)
        );
    }
}
