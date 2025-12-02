<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EquipmentDeleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function validationData(): array
    {
        $data = array_merge($this->all(), [
            'id' => $this->route('id'),
        ]);

        return $data;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:equipment,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID do equipamento deve ser informado.',
            'id.integer'  => 'O ID do equipamento deve ser um valor inteiro.',
            'id.exists'   => 'O equipamento informado não existe!.',
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