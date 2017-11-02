<?php

use Illuminate\Database\Seeder;

class Usuario_RNVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Usuario_RNV', 5)->create();
        //
    }
}
