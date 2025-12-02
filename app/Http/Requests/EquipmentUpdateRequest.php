<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EquipmentUpdateRequest extends FormRequest {
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
            'id.required' => 'O ID do equipamento deve ser informado.',
            'id.integer' => 'O ID do equipamento deve ser um valor inteiro.',
            'id.exists' => 'O equipamento informado não existe!.',
			'name.string' => 'O nome do equipamento deve ser do tipo string.',
			'name.required' => 'O nome do equipamento deve ser informado.',
			'name.max' => 'O nome do equipamento deve ter no máximo 75 caracteres.'
        ];
    }
	
	public function rules(): array {
        return [
            'id' => ['integer', 'required', 'exists:equipment,id'],
            'name' => ['string', 'required', 'max:75'],
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
