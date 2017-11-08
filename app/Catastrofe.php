<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catastrofe extends Model
{
    protected $fillable = ['id_user','nombre','tipo','fecha','descripcion'];
}
