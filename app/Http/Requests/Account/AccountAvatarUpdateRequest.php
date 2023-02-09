<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AccountAvatarUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'avatar' => ['image', 'mimes:jpeg,jpg,png']
        ];
    }

    public function messages(): array
    {
        return [
            'avatar.image' => "La photo de profil doit être une image.",
            'avatar.mimes' => "Les extensions de l'image ne peuvent être seulement (jpeg, jpg et png).",
        ];
    }
}
