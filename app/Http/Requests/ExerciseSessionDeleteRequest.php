<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExerciseSessionDeleteRequest extends FormRequest
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
            'id.required' => 'O ID da sessão de exercício é obrigatório.',
            'id.integer' => 'O ID da sessão de exercício deve ser do tipo integer.',
            'id.exists' => 'A sessão de exercício informada não existe.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array {
        return [
            'id' => ['required', 'integer', 'exists:exercise_session,id'],
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
