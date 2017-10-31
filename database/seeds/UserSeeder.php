<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$id_rols = Rol::all()->select('id');
    	Review::create([
    		'name' => str_random(10),
    		'email' => str_random(10).'@gmail.com',
    		'password' => bcrypt('secret'),
    		'id_rol' => array_random($id_rols),
    	]);
        //
    }
}
