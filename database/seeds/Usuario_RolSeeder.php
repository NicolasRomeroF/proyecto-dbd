<?php

use Illuminate\Database\Seeder;

class Usuario_RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Usuario_Rol', 5)->create();
        //
    }
}
