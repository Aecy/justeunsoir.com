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
            'gender' => ['nullable', 'string', Rule::in('H', 'F', 'A')],
            'martial' => ['nullable', 'string', Rule::in('C', 'E', 'MSE', 'MAE')],
            'age' => ['nullable', 'integer', Rule::in(range(18, 99))],
            'country' => ['nullable', 'string', 'in:FR,BE'],
            'state' => ['nullable', 'string'],
            'birth_at' => ['nullable', 'date'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
