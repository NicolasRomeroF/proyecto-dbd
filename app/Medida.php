<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    //
    protected $fillable = ['id_user','nombre','fecha_inicio','fecha_termino','direccion','descripcion','tipo'];
    public function comuna()
    {
    	return $this->belongsTo('App\Comuna','id_comuna');
    }

}
