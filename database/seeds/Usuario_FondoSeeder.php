<?php

use Illuminate\Database\Seeder;

class Usuario_FondoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Usuario_Fondo', 5)->create();
        //
    }
}
