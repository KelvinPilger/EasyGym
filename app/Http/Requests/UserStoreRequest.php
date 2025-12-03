<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UserStoreRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'username.required' => 'O nome do usuário deve ser informado.',
            'username.string' => 'O nome do usuário deve ser do tipo string.',
            'username.max' => 'O nome do usuário deve ter no máximo 255 caracteres.',
            'email.required' => 'O e-mail deve ser preenchido.',
            'email.email' => 'O e-mail informado não está no formato adequado.',
            'password.required' => 'A senha deve ser preenchida.',
            'password.string' => 'A senha deve ser do tipo string.',
            'remember_token.string' => 'O token deve ser do tipo string.',
            'cpf.required' => 'O CPF deve ser informado.',
            'cpf.string' => 'O CPF deve ser do tipo string.',
            'cpf.max' => 'O CPF deve ter no máximo 14 caracteres.',
            'role.required' => 'O cargo deve ser informado.',
            'role.string' => 'O cargo deve ser do tipo string.',
            'role.max' => 'O cargo deve ter no máximo 30 caracteres.',
            'sex.required' => 'O sexo deve ser informado.',
            'sex.string' => 'O sexo deve ser do tipo string.',
            'sex.size' => 'O sexo deve ter no máximo 1 caractere.'
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

     public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'remember_token' => ['nullable', 'string'],
            'cpf' => ['required', 'string', 'max:14'],
            'role' => ['required', 'string', 'max:30'],
            'sex' => ['required', 'string', 'size:1'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }


}
