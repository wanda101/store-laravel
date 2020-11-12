<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    
    protected $fillable=[
        'name'
    ];

    protected $hidden=[
    ];

    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }
}