<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aoo\Provincia;

class Region extends Model
{
    public function provincias(){
    	return $this->hasMany('Provincia','id');
    }
}
