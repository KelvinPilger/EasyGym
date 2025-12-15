<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkoutCompletedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
            'user_id.required' => 'O ID do usuário deve ser informado.',
            'user_id.integer' => 'O ID da sessão de treino informada deve ser do tipo inteiro.',
            'user_id.exists' => 'Não há nenhuma sessão com o treino informado.',
        ];
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:workout,user_id'],
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
