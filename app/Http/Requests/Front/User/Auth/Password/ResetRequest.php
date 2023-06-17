<?php

namespace App\Http\Requests\Front\User\Auth\Password;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
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
                'password' => ['required', 'min:4', 'max:8'],
                'confirm_password' => ['required', 'min:4', 'max:8', 'same:password']
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
                'password.max' => 'Şifre maksimum sekiz karakterden oluşmalıdır',
                'confirm_password.required' => 'Doldurulması zorunlu alan',
                'confirm_password.min' => 'Şifre minimum dört karakterden oluşmalıdır',
                'confirm_password.max' => 'Şifre maksimum sekiz karakterden oluşmalıdır',
                'confirm_password.same' => 'Şİfre ve onaylama  şifresi eşleşmiyor'
            ];
    }
}
