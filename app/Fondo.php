<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
    public function catastrofe()
    {
    	return $this->belongsTo('App\Catastrofe','id_catastrofe');
    }
}
