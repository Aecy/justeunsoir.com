<?php

namespace App\Http\Requests\Account;

use App\Enums\User\UserDrinkingEnum;
use App\Enums\User\UserSmokingEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class AccountInterestUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'interest_for' => ['nullable', 'string', 'max:20000'],
            'smoking' => ['nullable', 'string', new Enum(UserSmokingEnum::class)],
            'drinking' => ['nullable', 'string', new Enum(UserDrinkingEnum::class)],
        ];
    }
}
