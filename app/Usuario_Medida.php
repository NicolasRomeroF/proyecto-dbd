<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Medida extends Model
{
     public function comuna()
    {
        return $this->hasOne('App\Comuna');
    }
}
