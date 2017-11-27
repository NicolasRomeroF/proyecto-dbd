<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catastrofe extends Model
{
    protected $fillable = ['id_user','nombre','tipo','fecha','descripcion'];
    public function getFechaAttribute($value)
    {
    	return date("m-d-Y", strtotime($value));
    }
    public function comuna()
    {
    	return $this->belongsTo('App\Comuna','id_comuna');
    }
}
