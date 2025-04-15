<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;

class Post extends Model
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

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    // Relationships
    public function seller(){
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function images(){
        return $this->hasMany(PostImage::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function order(){
        return $this->hasOne(Order::class);
    }
}
