<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function search(Request $request): View
    {
        $categories = Category::all();
        $keyWord = $request->input('key_word');
        $products = Product::query()->where('title', 'like', '%'.$keyWord.'%')->get();
        return view('front.dashboard.index', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
