<?php

use Illuminate\Database\Seeder;

class FondoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Fondo', 5)->create();
        //
    }
}
