<?php

use Illuminate\Database\Seeder;

class Evento_beneficioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Evento_beneficio', 5)->create();
        //
    }
}
