<?php

use Illuminate\Database\Seeder;

class Usuario_MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Usuario_Medida', 5)->create();
        //
    }
}
