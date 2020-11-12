<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{

    protected $table = 'regencies';

    protected $hidden = [
        'province_id'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
  
}