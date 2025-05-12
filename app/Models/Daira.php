<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daira extends Model
{
    protected $fillable = ['code', 'wilaya_id', 'name'];



    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
