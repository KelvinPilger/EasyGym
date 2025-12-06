<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkoutUpdateRequest extends FormRequest
{
	public function validationData(): array
    {
        $data = array_merge($this->all(), [
            'id' => $this->route('id'),
        ]);

        return $data;
    }

    public function messages(): array {
		return [
			'id.required' => 'O ID do treino deve ser preenchido.',
			'id.integer' => 'O ID do treino deve ter um valor do tipo integer.',
			'id.exists' => 'O treino informado não é existente.',
			'workout_desc.string' => 'A descrição do treino deve ser do tipo string.',
			'expiration_date.date' => 'A data de vencimento do treino deve ser do tipo date.',
			'maximum_sections.integer' => 'O valor máximo de sessões deve ser do tipo integer.',
			'user_id.integer' => 'O ID do usuário informado deve ser do tipo integer.'
		];
	}

    public function rules(): array
    {
        return [
			'id' => ['required', 'integer', 'exists:workout,id'],
            'workout_desc' => ['sometimes', 'string'],
			'expiration_date' => ['sometimes', 'date'],
			'maximum_sections' => ['sometimes', 'integer'],
			'user_id' => ['sometimes', 'integer']
        ];
    }

	public function authorize(): bool
    {
        return true;
    }
}
