<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'buyer_id',
        'seller_id',
        'post_id',
        'address_id',
        'status',
    ];

    // Relationships
    public function buyer(){
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function post(){
        return $this->belongsTo(Post::class, );
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }
}
