<?php

namespace App\Http\Requests\Front\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
            [
                'email' => ['required', 'email', 'exists:users'],
                'password' => ['required', 'min:4', 'max:8']
            ];
    }

    public function messages(): array
    {
        return
            [
                'email.required' => 'Doldurulması zorunlu alan',
                'email.email' => 'Girilen değer email tipinde olmalıdır',
                'email.exists' => 'Bilginizi kontrol ediniz',
                'password.required' => 'Doldurulması zorunlu alan',
                'password.min' => 'Şifre minimum dört karakterden oluşmalıdır',
                'password.max' => 'Şifre maksimum sekiz karakterden oluşmalıdır'
            ];
    }
}
