<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catastrofe extends Model
{
    protected $fillable = ['id_user','nombre','tipo','fecha','descripcion'];

    public function getFecha()
    {
        return date("m-d-Y", strtotime($this->fecha));
    }
    public function comuna()
    {
    	return $this->belongsTo('App\Comuna','id_comuna');
    }
}
