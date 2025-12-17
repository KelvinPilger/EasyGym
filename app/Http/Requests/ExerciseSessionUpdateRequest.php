<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExerciseSessionUpdateRequest extends FormRequest
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
            'id.required' => 'O ID da sessão de exercício é obrigatório.',
            'id.integer' => 'O ID da sessão de exercício deve ser do tipo integer.',
            'id.exists' => 'A sessão de exercício informada não existe.',
            'workout_session_id.required' => 'O ID da sessão de treino é obrigatório.',
            'workout_session_id.integer' => 'O tipo do ID da sessão treino deve ser integer.',
			'workout_exercise_id.required' => 'O ID do exercício do treino é obrigatório.',
			'workout_exercise_id.integer' => 'O tipo do ID do exercício do treino deve ser integer.',
			'picked_weight.required' => 'O peso utilizado deve ser preenchida.',
			'picked_weight.integer' => 'O peso utilizado no exercício deve ser do tipo integer.',
			'repetitions_total.required' => 'O número de repetições deve ser informado.',
			'repetitions_total.integer' => 'O número de repetições deve ser do tipo integer.',
			'series_made.required' => 'O número de séries feitas deve ser informado.',
			'series_made.integer' => 'O número de séries feitas deve ser do tipo integer.',
			'interval_made.required' => 'O intervalo feito entre as séries deve ser informado.',
			'interval_made.string' => 'O intervalo feito deve ser do tipo string.',
			'interval_made.max' => 'O intervalo feito deve ter no máximo até 10 caracteres.',
            'rpe.string' => 'O RPE deve ser do tipo string.',
            'rpe.max' => 'O RPE deve ser um valor de 0-10.',
            'pain_level.string' => 'O nível de dor deve ser do tipo string.',
            'pain_level.max' => 'O nível de dor deve ser um valor de 0-10.'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array {
        return [
            'id' => ['required', 'integer', 'exists:exercise_session,id'],
            'workout_session_id' => ['required', 'integer'],
			'workout_exercise_id' => ['required', 'integer'],
			'picked_weight' => ['required', 'integer'],
            'series_made' => ['required', 'integer'],
			'repetitions_total' => ['required', 'integer'],
			'interval_made' => ['required', 'string', 'max:10'],
            'rpe' => ['sometimes', 'string', 'max:2'],
            'pain_level' => ['sometimes', 'string', 'max:2'],
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
