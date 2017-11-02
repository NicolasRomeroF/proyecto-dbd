<?php

use Illuminate\Database\Seeder;

class DonacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Donacion', 5)->create();
        //
    }
}
