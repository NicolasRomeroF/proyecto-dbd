<?php

namespace App;

use Illuminate\Database\Eloquent\Mo

class Catastrofe extends Model
{
    protected $fillable = ['id_user','nombre','tipo','fecha','descripcion'];
    public function getFechaAttribute($value)
    {
    	$arr = preg_split("-",$value);
    	$str = $arr[2] +$arr[1] +$arr[0];
        return $str;
    }
}
