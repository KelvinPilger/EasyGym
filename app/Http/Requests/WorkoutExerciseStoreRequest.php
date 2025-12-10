<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkoutExerciseStoreRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'workout_id.required' => 'O ID do treino é obrigatório.',
            'workout_id.integer' => 'O tipo do ID do treino deve ser integer.',
            'started_at.required' => 'A sessão de treino precisa de uma data e hora de início.',
            'started_at.date_format:Y-m-d H:i:s' => 'O tipo de dados do início da sessão de treino deve ser timestamp.',
            'finished_at.date_format:Y-m-d H:i:s' => 'O tipo de dados do fim da sessão de treino deve ser timestamp.'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array {
        return [
            'workout_id' => ['required', 'integer'],
			'exercise_id' => ['required', 'integer']
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
