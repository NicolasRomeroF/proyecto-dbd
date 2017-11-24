<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable = ['tipo','nombre','cantidad', 'descripcion'];

    protected $hidden = ['id_centro'];
}
