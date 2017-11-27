<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public function regiones(){
    	return $this->belongsTo('Region','id_region');
    }
    public function comunas(){
    	return $this->hasMany('Comuna');
    }
}
