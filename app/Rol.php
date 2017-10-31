<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable = ['nombre','detalle'];

    public function usuarios() {
    	return $this->hasMany(User::class,'id_rol');
    }
}
