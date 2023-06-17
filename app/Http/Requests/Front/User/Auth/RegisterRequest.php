<?php

namespace App\Http\Requests\Front\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return
            [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'min:4', 'max:8'],
                'confirm_password' => ['required', 'min:4', 'max:8', 'same:password']
            ];
    }

    public function messages(): array
    {
        return
            [
                'first_name.required' => 'Doldurulması zorunlu alan',
                'last_name.required' => 'Doldurulması zorunlu alan',
                'email.required' => 'Doldurulması zorunlu alan',
                'email.email' => 'Girilen değer email tipinde olmalıdır',
                'email.unique' => 'Kayıtlı email adresi',
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
