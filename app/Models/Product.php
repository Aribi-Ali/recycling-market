<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;

class Product extends Model
{
    protected $fillable =
        [
            'title',
            'slug',
            'description',
            'is_free',
            'price',
            'condition',
            'status',
            'category_id',
            'seller_id',
            'published_at'
        ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->title);
        });
    }

    // Relationships
    public function seller(){
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function order(){
        return $this->hasOne(Order::class);
    }
}
