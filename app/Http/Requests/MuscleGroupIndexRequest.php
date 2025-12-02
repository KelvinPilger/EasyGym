<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuscleGroupIndexRequest extends FormRequest {
    public function rules(): array {
        return [
            'id' => ['integer', 'sometimes'],
            'name' => ['string', 'sometimes', 'max:20']
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
