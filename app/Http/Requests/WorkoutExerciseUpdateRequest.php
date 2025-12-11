<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkoutExerciseUpdateRequest extends FormRequest
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
            'id.required' => 'O ID do exercício do treino é obrigatório.',
            'id.integer' => 'O ID do exercício do treino deve ser do tipo integer.',
            'id.exists' => 'O ID informado não é existente.',
            'workout_id.required' => 'O ID do treino é obrigatório.',
            'workout_id.integer' => 'O tipo do ID do treino deve ser integer.',
			'exercise_id.required' => 'O ID do exercício é obrigatório.',
			'exercise_id.integer' => 'O tipo do ID do exercício deve ser integer.',
			'section_label.required' => 'A descrição do exercício deve ser preenchida.',
			'section_label.string' => 'A descrição do exercício deve ser do tipo string.',
			'section_label.max' => 'O limite do campo de descrição do exercício é de até 100 caracteres.',
			'repetitions.required' => 'O número de repetições deve ser informado.',
			'repetitions.integer' => 'O número de repetições deve ser do tipo integer.',
			'series.required' => 'O número de séries deve ser informado.',
			'series.integer' => 'O número de séries deve ser do tipo integer.',
			'interval.required' => 'O intervalo entre as séries deve ser informado.',
			'interval.string' => 'O intervalo deve ser do tipo string.',
			'interval.max' => 'O intervalo deve ter no máximo até 10 caracteres.'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array {
        return [
            'id' => ['required', 'integer', 'exists:workout_exercise,id'],
            'workout_id' => ['required', 'integer'],
			'exercise_id' => ['required', 'integer'],
			'section_label' => ['required', 'string', 'max:100'],
			'repetitions' => ['required', 'integer'],
			'series' => ['required', 'integer'],
			'interval' => ['required', 'string', 'max:10']
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
