<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'credits' => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Vous devez entrer le nom du pack.",
            'price.required' => "Vous devez entrer le prix du pack en centime.",
            'credits.required' => "Vous devez entrer le nombre de crédits du pack."
        ];
    }
}
