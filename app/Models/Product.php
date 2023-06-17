<?php

namespace App\Models;

use App\Observers\Admin\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'price',
        'old_price',
        'image',
        'description'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(CartDetails::class);
    }
    public static function boot()
    {
        parent::boot();
        parent::observe(ProductObserver::class);
    }
}
