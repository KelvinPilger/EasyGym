<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentUpdateRequest extends FormRequest {
    public function rules(): array {
        return [
            'id' => ['integer', 'required'],
            'name' => ['string', 'required', 'max:75'],
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
