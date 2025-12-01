<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentIndexRequest extends FormRequest {
    public function rules(): array {
        return [
            'id' => ['integer', 'sometimes'],
            'name' => ['string', 'sometimes']
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
