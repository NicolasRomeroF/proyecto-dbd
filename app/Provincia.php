<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
     public function region()
    {
    	return $this->belongsTo('App\Region','id_region');
    }
    public function comunas(){
    	return $this->hasMany('Comuna');
    }
}
