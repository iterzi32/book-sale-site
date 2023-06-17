<?php

namespace App\Http\Requests\Admin\Auth;

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
                'email' => ['required', 'email', 'exists:admins'],
                'password' => ['required', 'min:4', 'max:8'],
            ];
    }

    public function messages(): array
    {
        return
            [
                "email.required" => "Doldurulması zorunlu alan.",
                "email.email" => "E-posta formatına uygun değer giriniz.",
                "email.exists" => "Bilginizi kontrol ediniz",
                "password.required" => "Doldurulması zorunlu alan.",
                "password.min" => "Bu alan en az dört karakterden oluşmalıdır",
                "password.max" => "Bu alan en çok sekiz karakterden oluşmalıdır.",
            ];
    }
}
