<?php

namespace App\Http\Requests\Admin\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3']
        ];
    }

    public function messages(): array
    {
        return
            [
                'title.required' => 'Doldurulması zorunlu alan.',
                'title.min' => 'Bu alan en az üç karakterden oluşmalıdır'
            ];
    }
}
