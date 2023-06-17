<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dashboard\Product\RegisterRequest;
use App\Http\Requests\Admin\Dashboard\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function index(): View
    {
        return view('admin.dashboard.product.index', [
            'products' => Product::query()->orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function create(): View
    {
        return view('admin.dashboard.product.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $product = new Product();
        $product->title = $request->input('title');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->old_price = $request->input('old_price');
        $imageName = Str::slug($request->title) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        $product->image = 'images/' . $imageName;
        $product->description = $request->input('description');
        $product->save();
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(int $id): View
    {
        return view('admin.dashboard.product.edit', [
            'product' => Product::findOrFail($id),
            'categories' => Category::all()
        ]);
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->title = $request->input('title');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->old_price = $request->input('old_price');
        if ($request->hasFile('image')) {
            $imageName = Str::slug($request->title) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = 'images/' . $imageName;
        }
        $product->description = $request->input('description');
        $product->update();
        return redirect()->route('product.index');
    }

    public
    function destroy(int $id): RedirectResponse
    {
        Product::findOrFail($id)->delete();
        return redirect()->back();
    }
}
