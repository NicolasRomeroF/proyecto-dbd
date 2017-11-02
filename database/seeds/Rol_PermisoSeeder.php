<?php

use Illuminate\Database\Seeder;

class Rol_PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Rol_Permiso', 5)->create();
        //
    }
}
