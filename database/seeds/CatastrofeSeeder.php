<?php

use Illuminate\Database\Seeder;

class CatastrofeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Catastrofe', 5)->create();
        //
    }
}
