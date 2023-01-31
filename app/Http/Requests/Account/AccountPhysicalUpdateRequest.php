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
            'height' => ['nullable', 'integer'],
            'morphology' => ['nullable', 'string', 'in:S,M,D,N,Q,R'],
            'hair_color' => ['nullable', 'string'],
            'eye_color' => ['nullable', 'string'],
        ];
    }
}
