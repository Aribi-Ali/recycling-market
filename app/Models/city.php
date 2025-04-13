<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $fillable = ['code', 'daira_id', 'name'];



    public function daira()
    {
        return $this->belongsTo(Daira::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
