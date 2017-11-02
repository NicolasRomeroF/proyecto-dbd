<?php

use Illuminate\Database\Seeder;
//use App\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Rol::class, 5)->create();
    }
}
