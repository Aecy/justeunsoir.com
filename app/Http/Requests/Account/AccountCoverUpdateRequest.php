<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AccountCoverUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cover' => ['image', 'mimes:jpeg,jpg,png', 'dimensions:width=1180,height=300']
        ];
    }

    public function messages(): array
    {
        return [
            'cover.image' => "La photo de couverture doit être une image.",
            'cover.mimes' => "Les extensions de l'image ne peuvent être seulement (jpeg, jpg et png).",
            'cover.dimensions' => "Les dimensions de votre image doit être 1180x300.",
        ];
    }
}
