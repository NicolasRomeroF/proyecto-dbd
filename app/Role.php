<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','description'];

    public function usuarios() {
    	return $this->hasMany(User::class,'id_role');
    }
    public function users()
	{
	  return $this->belongsToMany(User::class);
	}
}
