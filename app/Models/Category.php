<?php

namespace App\Models;

use App\Observers\Admin\CategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable = [
        'title',
        'slug'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function boot()
    {
        parent::boot();
        parent::observe(CategoryObserver::class);
    }
}
