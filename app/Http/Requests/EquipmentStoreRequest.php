<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentStoreRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => ['string', 'required', 'max:75'],
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
