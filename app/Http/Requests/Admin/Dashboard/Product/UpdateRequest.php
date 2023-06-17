<?php

namespace App\Http\Requests\Admin\Dashboard\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
            [
                'category_id' => ['required', 'numeric'],
                'title' => ['required'],
                'price' => ['required', 'numeric'],
                'old_price' => ['required', 'numeric'],
                'image' => ['mimes:jpg,jpeg,png'],
                'description' => ['required', 'min:5']
            ];
    }

    public function messages(): array
    {
        return
            [
                'category_id.required' => 'Doldurulması zorunlu alan',
                'category_id.numeric' => 'Bu alan sayısal değer olmalı',
                'title.required' => 'Doldurulması zorunlu alan',
                'price.required' => 'Doldurulması zorunlu alan',
                'price.numeric' => 'Bu alan sayısal değer olmalı',
                'old_price.required' => 'Doldurulması zorunlu alan',
                'old_price.numeric' => 'Bu alan sayısal değer olmalı',
                'image.mimes' => 'Bu alan .jpg, .jpeg, .png uzantılı dosyalardan oluşmalı',
                'description.required' => 'Doldurulması zorunlu alan',
                'description.min' => 'BU alan minumum 5 karaterden oluşmalı'
            ];
    }
}
