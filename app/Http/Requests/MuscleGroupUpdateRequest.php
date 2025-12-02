<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MuscleGroupUpdateRequest extends FormRequest {
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
            'id.required' => 'O ID do grupo muscular deve ser informado.',
            'id.integer' => 'O ID do grupo muscular deve ser um valor inteiro.',
            'id.exists' => 'O grupo muscular informado não existe!.',
			'name.string' => 'O nome do grupo muscular deve ser do tipo string.',
			'name.required' => 'O nome do grupo muscular deve ser informado.',
			'name.max' => 'O nome do grupo muscular deve ter no máximo 20 caracteres.'
        ];
    }

    public function rules(): array {
        return [
            'id' => ['integer', 'required'],
            'name' => ['string', 'required', 'max:20']
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
