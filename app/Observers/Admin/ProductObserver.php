<?php

namespace App\Observers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product): void
    {
        $product->title = Str::title($product->getAttribute('title'));
        $product->slug = Str::slug($product->title);
    }
    public function updating(Product $product): void
    {
        $product->title = Str::title($product->getAttribute('title'));
        $product->slug = Str::slug($product->title);
    }

}
