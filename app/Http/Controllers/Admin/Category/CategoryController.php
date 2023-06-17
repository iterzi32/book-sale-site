<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dashboard\Category\RegisterRequest;
use App\Http\Requests\Admin\Dashboard\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard.category.index', [
           'categories' => Category::query()->orderBy('created_at', 'DESC')->get()
        ]);
    }


    public function create(): View
    {
        return view('admin.dashboard.category.create');
    }


    public function store(RegisterRequest $request): RedirectResponse
    {
        $category = new Category();
        $category->fill($request->toArray())->save();
        return redirect()->route('category.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(int $id): View
    {
        return view('admin.dashboard.category.edit',[
            'category' => Category::findOrFail($id)
        ]);
    }


    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        Category::findOrFail($id)
                ->fill($request->toArray())
                ->update();
        return redirect()->route('category.index');
    }


    public function destroy(int $id): RedirectResponse
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }
}
