<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function cadenas()
    {
        return $this->belongsTo('App\Cadena','cadena_id');
    }
}
