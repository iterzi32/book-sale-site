<?php

namespace App\Http\Requests\Front\User\Auth\Password;

use Illuminate\Foundation\Http\FormRequest;

class ForgotRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
            [
                'email' => ['required', 'email', 'exists:users']
            ];
    }

    public function messages(): array
    {
        return
            [
                'email.required' => 'Doldurulması zorunlu alan',
                'email.email' => 'Girilen değer email tipinde olamalı',
                'email.exists' => 'Bilginizi kontrol ediniz'
            ];
    }
}
