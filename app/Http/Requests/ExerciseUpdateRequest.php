<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExerciseUpdateRequest extends FormRequest
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
			'id.required' => 'O ID do exercício deve ser preenchido.',
			'id.integer' => 'O ID do exercício deve ser do tipo inteiro.',
			'id.exists' => 'O exercício repassado não foi encontrado, ou foi excluído.',
			'exercise_desc.string' => 'O nome do exercício deve ser do tipo string.',
			'exercise_desc.required' => 'O nome do exercício deve ser informado.',
			'exercise_desc.max' => 'O nome do exercício deve ter no máximo 50 caracteres.',
			'muscle_group_id.required' => 'O ID do grupo muscular deve ser informado.',
			'muscle_group_id.integer' => 'O ID do grupo muscular deve ser do tipo integer.',
			'equipment_id.required' => 'O ID do equipamento deve ser informado.',
			'equipment_id.integer' => 'O ID do equipamento deve ser do tipo integer.',
			'video_url.string' => 'A URL do vídeo deve ser do tipo string.',
			'video_url.max' => 'A URL do vídeo deve ter no máximo 255 caracteres.',
			'image_url.string' => 'A URL da imagem deve ser do tipo string.',
			'image_url.max' => 'A URL da imagem deve ter no máximo 255 caracteres.',
		];
	}
	
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:exercise,id,deleted_at,NULL'],
			'exercise_desc' => ['required', 'string', 'max:50'],
			'muscle_group_id' => ['required', 'integer'],
			'equipment_id' => ['required', 'integer'],
			'video_url' => ['sometimes', 'string', 'max:255'],
			'image_url' => ['sometimes', 'string', 'max:255'],
        ];
    }
	
	public function authorize(): bool
    {
        return true;
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
