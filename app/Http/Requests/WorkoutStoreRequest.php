<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkoutStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
	
	public function messages(): array {
		return [
			'workout_desc.required' => 'A descrição do treino é obrigatória.',
			'workout_desc.string' => 'A descrição do treino deve ser do tipo string.',
			'expiration_date.required' => 'A data de vencimento do treino deve ser preenchida.',
			'expiration_date.date' => 'A data de vencimento do treino deve ser do tipo date.',
			'maximum_sections.required' => 'Informe o valor máximo de sessões para o treino.',
			'maximum_sections.integer' => 'O valor máximo de sessões deve ser do tipo integer.',
			'user_id.required' => 'É obrigatório informar o usuário vinculado ao treino.',
			'user_id.integer' => 'O ID do usuário informado deve ser do tipo integer.'
		];
	}

    public function rules(): array
    {
        return [
            'workout_desc' => ['required', 'string'],
			'expiration_date' => ['required', 'date'],
			'maximum_sections' => ['required', 'integer'],
			'user_id' => ['required', 'integer']
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
