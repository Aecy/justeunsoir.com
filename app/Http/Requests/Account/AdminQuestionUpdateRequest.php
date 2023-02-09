<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AdminQuestionUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => "Vous devez entrer le titre de la question.",
            'content.required' => "Vous devez entrer la réponse de la question."
        ];
    }
}
