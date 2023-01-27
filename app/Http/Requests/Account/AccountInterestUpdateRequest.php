<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountInterestUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'interest_for' => ['string', 'max:20000'],
            'smoking' => ['string', Rule::in('PDT', 'OED', 'R', 'O', 'RG')],
            'drinking' => ['string', Rule::in('PDT', 'OED', 'R', 'O', 'RG')],
        ];
    }
}
