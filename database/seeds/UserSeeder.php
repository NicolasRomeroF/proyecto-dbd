<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin'.'@admin.cl',
            'password' => bcrypt('admin'),
            'id_rol' => 1,
        ]);
    	//factory('App\User', 5)->create();
        
    }
}
