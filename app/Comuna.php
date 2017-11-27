<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    public function provincia()
    {
    	return $this->belongsTo('App\Provincia','id_provincia');
    }
}
