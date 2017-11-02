<?php

use Illuminate\Database\Seeder;

class Centro_AcopioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Centro_acopio', 5)->create();
        //
    }
}
