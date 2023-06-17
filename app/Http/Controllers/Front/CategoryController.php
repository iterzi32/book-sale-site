<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index($categorySlug): View
    {
        $category = Category::query()->where('slug', $categorySlug)->first();
        $products = Product::query()->where('category_id', $category->id)->get();
        return view('front.dashboard.category.index', ['products' => $products]);
    }
}
