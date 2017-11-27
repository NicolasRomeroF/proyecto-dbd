<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    public function provincias(){
    	return $this->belongsTo('Provincia','id_provincia');
    }
}
