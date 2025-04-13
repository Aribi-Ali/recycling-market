<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name_ar',
        'name_fr',
        'name_en',
        'description_ar',
        'description_fr',
        'description_en',
        'image',
        'price',
        'newPrice',
        'specialPrice',
        'specialPriceStart',
        'specialPriceEnd',
    ];
}