<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;


class FilterController extends Controller
{
    public function filter(Request $request): View
    {
        $categories = Category::all();
        $id = $request->input('category_id');
        $minPrice = $request->input('min_price');
        $max_price = $request->input('max_price');
        $products = Product::query()
                           ->where('category_id', $id)
                           ->whereBetween('price', [$minPrice, $max_price])
                           ->get();
        return view('front.dashboard.index', [
           'categories' => $categories,
           'products' => $products
        ]);
    }
}
