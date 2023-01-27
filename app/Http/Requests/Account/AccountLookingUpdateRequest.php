<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AccountLookingUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'looking_for' => ['required', 'string', 'max:20000'],
        ];
    }

    public function messages(): array
    {
        return [
            'looking_for.required' => "Vous devez entrer des informations concernant ce que vous recherchez."
        ];
    }
}
