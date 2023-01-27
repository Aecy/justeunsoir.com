<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AccountAboutUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'about_me' => ['required', 'string', 'max:20000'],
        ];
    }

    public function messages(): array
    {
        return [
            'about_me.required' => "Vous devez entrer des informations a propos de vous !"
        ];
    }
}
