<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDeleteRequest extends FormRequest
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
            'id.required' => 'O ID do usuário deve ser informado.',
            'id.integer' => 'O ID do usuário deve ser um valor inteiro.',
            'id.exists' => 'O ID do usuário informado não foi encontrado.'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:users,id']
        ];
    }
}
