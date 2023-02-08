<?php

namespace App\Http\Requests;

use App\Enums\User\UserGendersEnum;
use App\Enums\User\UserMartialsEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'gender' => ['nullable', 'string', new Enum(UserGendersEnum::class)],
            'martial' => ['nullable', 'string', new Enum(UserMartialsEnum::class)],
            'age' => ['nullable', 'integer', Rule::in(range(18, 99))],
            'country' => ['nullable', 'string', 'in:FR,BE'],
            'state' => ['nullable', 'string'],
            'birth_at' => ['nullable', 'date'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
