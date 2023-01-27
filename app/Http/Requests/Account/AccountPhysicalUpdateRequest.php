<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AccountPhysicalUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'height' => ['integer'],
            'weight' => ['integer'],
            'hair_color' => ['string'],
            'eye_color' => ['string'],
        ];
    }
}
