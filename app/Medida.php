<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    //
    protected $fillable = ['id_user','nombre','fecha_inicio','fecha_termino','direccion','descripcion','tipo'];
    public function centro_acopio()
    {

        return $this->hasOne('App\Centro_acopio');

    }
}
