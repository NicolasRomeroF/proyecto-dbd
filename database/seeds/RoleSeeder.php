<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
	    $role_admin->name = 'admin';
	    $role_admin->description = 'Administrador de la aplicacion';
	    $role_admin->save();

	    $role_gobierno = new Role();
	    $role_gobierno->name = 'gobierno';
	    $role_gobierno->description = 'Usuario de gobierno';
	    $role_gobierno->save();

	    $role_organizacion = new Role();
	    $role_organizacion->name = 'organizacion';
	    $role_organizacion->description = 'Usuario de organizacion';
	    $role_organizacion->save();

	    $role_natural = new Role();
	    $role_natural->name = 'natural';
	    $role_natural->description = 'Usuario natural';
	    $role_natural->save();
    }
}
