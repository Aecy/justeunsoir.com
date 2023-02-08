<?php

namespace App\Http\Requests\Account;

use App\Enums\User\UserMorphologyEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'morphology' => ['nullable', 'string', new Enum(UserMorphologyEnum::class)],
            'hair_color' => ['nullable', 'string'],
            'eye_color' => ['nullable', 'string'],
        ];
    }
}
