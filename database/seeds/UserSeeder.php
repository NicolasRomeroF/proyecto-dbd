<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_gobierno = Role::where('name', 'gobierno')->first();
        $role_organizacion = Role::where('name', 'organizacion')->first();
        $role_natural = Role::where('name', 'natural')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->activo = true; 
        $admin->save();
        $admin->roles()->attach($role_admin);

        $gobierno = new User();
        $gobierno->name = 'Gobierno';
        $gobierno->email = 'gobierno@example.com';
        $gobierno->password = bcrypt('secret');
         $gobierno->activo = true; 
        $gobierno->save();
        $gobierno->roles()->attach($role_gobierno);

        $organizacion = new User();
        $organizacion->name = 'Organizacion';
        $organizacion->email = 'organizacion@example.com';
        $organizacion->password = bcrypt('secret');
        $organizacion->activo=true;
        $organizacion->save();
        $organizacion->roles()->attach($role_organizacion);

        $natural = new User();
        $natural->name = 'Natural';
        $natural->email = 'natural@example.com';
        $natural->password = bcrypt('secret');
        $natural->activo=true;
        $natural->save();
        $natural->roles()->attach($role_natural);
        
    }
}
