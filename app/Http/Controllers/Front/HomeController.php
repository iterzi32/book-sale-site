<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        $products = Product::all();
        return view('front.dashboard.index', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
