<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    protected $fillable = ['code', 'name'];
    protected $hidden = ['created_at', 'updated_at'];


    public function dairas()
    {
        return $this->hasMany(Daira::class);
    }
}
