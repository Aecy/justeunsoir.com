<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'gender' => ['string', Rule::in('H', 'F', 'A')],
            'martial' => ['string', Rule::in('C', 'E', 'MSE', 'MAE')],
            'age' => ['integer', Rule::in(range(18, 99))],
            'address' => ['string'],
            'birth_at' => ['date'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
