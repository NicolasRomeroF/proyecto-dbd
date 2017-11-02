<?php

use Illuminate\Database\Seeder;

class RNV_MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\RNV_Medida', 5)->create();
        //
    }
}
