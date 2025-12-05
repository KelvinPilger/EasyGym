<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkoutIndexRequest extends FormRequest
{
    public function validationData(): array
    {
        $data = array_merge($this->all(), [
            'user_id' => $this->route('user_id'),
        ]);

        return $data;
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'O ID do usuário é obrigatório.',
            'user_id.exists' => 'O usuário informado não possui treino vinculado.',
            'user_id.integer' => 'O ID do usuário informado deve ser do tipo inteiro.',
        ];
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:workout,user_id']
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

    public function authorize(): bool
    {
        return true;
    }
}
