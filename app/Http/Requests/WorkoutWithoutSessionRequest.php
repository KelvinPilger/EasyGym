<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkoutWithoutSessionRequest extends FormRequest
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
            'days.required' => 'O número de dias sem sessão deve ser informado.',
            'days.integer' => 'O número de dias deve ser do tipo inteiro.'
        ];
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:workout,user_id'],
            'days' => ['required', 'integer']
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
