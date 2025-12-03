<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserUpdateRequest extends FormRequest
{
    public function validationData(): array
    {
        return array_merge($this->all(), [
            'id' => $this->route('id'),
        ]);
    }

    public function messages(): array
    {
        if ($this->isMethod('patch')) {
            return [
                'id.required'   => 'O ID do usuário deve ser informado.',
                'id.integer'    => 'O ID do usuário deve ser um valor inteiro.',
                'id.exists'     => 'O usuário informado não existe!.',

                'email.email'   => 'O e-mail informado não está no padrão correto.',
                'email.max'     => 'O e-mail excede o limite de 255 caracteres.',
                'username.string' => 'O nome do usuário deve ser do tipo string.',
                'username.max'  => 'O limite de caracteres do nome do usuário é de 255.',
            ];
        }

        return [
            'id.required'      => 'O ID do usuário deve ser informado.',
            'id.integer'       => 'O ID do usuário deve ser um valor inteiro.',
            'id.exists'        => 'O usuário informado não existe!.',

            'username.required'=> 'O nome do usuário deve ser informado!',
            'username.string'  => 'O nome do usuário deve ser do tipo string.',
            'username.max'     => 'O limite de caracteres do nome do usuário é de 255.',

            'email.required'   => 'O e-mail é um campo obrigatório.',
            'email.email'      => 'O e-mail informado não está no padrão correto.',
            'email.max'        => 'O e-mail excede o limite de 255 caracteres.',
        ];
    }

    public function rules(): array
    {
        if ($this->isMethod('patch')) {
            return [
                'id'       => ['required', 'integer', 'exists:users,id'],
                'email'    => ['sometimes', 'email', 'max:255'],
                'username' => ['sometimes', 'string', 'max:255'],
            ];
        }

        return [
            'id'       => ['required', 'integer', 'exists:users,id'],
            'email'    => ['required', 'email', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
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
