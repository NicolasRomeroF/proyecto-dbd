<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    $fillable = ['nombre','detalle'];

    public function usuarios() {
    	return $this->hasMany(User::class,'id_rol');
    }
}
