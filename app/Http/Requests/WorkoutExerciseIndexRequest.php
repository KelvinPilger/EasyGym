<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkoutExerciseIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'workout_id.integer' => 'O ID da sessão de treino informada deve ser do tipo inteiro.',
            'workout_id.exists' => 'Não há nenhuma sessão com o treino informado.',
            'exercise_id.integer' => 'O ID da sessão de treino informada deve ser do tipo inteiro.',
            'exercise_id.exists' => 'Não há nenhuma sessão com o exercício informado.',
        ];
    }

    public function rules(): array
    {
        return [
            'workout_id' => ['sometimes', 'integer', 'exists:workout_exercise,workout_id'],
            'exercise_id' => ['sometimes', 'integer', 'exists:workout_exercise,exercise_id'],
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
