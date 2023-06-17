<?php

namespace App\Observers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    public function creating(Category $category): void
    {
        $category->title = Str::title($category->getAttribute('title'));
        $category->slug = Str::slug($category->title);
    }

    public function updating(Category $category): void
    {
        $category->title = Str::title($category->getAttribute('title'));
        $category->slug = Str::slug($category->title);
    }

}
