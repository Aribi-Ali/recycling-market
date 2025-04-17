<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'address_id',
        'status',
    ];

    // Relationships
    public function buyer(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }
}
