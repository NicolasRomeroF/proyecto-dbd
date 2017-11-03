<?php

use Illuminate\Database\Seeder;

class Catastrofe_ComunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Catastrofe_Comuna', 5)->create();
        //
    }
}
