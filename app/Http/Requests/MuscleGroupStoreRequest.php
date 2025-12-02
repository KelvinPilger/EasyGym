<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MuscleGroupStoreRequest extends FormRequest {
    public function messages(): array
    {
        return [
            'name.required' => 'O nome do grupo muscular deve ser informado.',
			'name.string' => 'O nome do grupo muscular deve ser do tipo string.',
			'name.max' => 'O nome do grupo muscular deve ter no máximo 20 caracteres.'
        ];
    }

    public function rules(): array {
        return [
            'name' => ['string', 'sometimes', 'max:20']
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

    public function authorize(): bool {
        return true;
    }
}
