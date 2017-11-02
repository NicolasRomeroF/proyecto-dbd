<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->call(RolSeeder::class);
    	//$this->call(OrganizacionSeeder::class);
    	//$this->call(UserSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(CatastrofeSeeder::class);
        $this->call(Centro_AcopioSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(ComunaSeeder::class);
        $this->call(DireccionSeeder::class);
        $this->call(DonacionSeeder::class);
        $this->call(Evento_beneficioSeeder::class);
        $this->call(FondoSeeder::class);
        $this->call(HistorialSeeder::class);
        $this->call(MedidaSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(RNV_MedidaSeeder::class);
        $this->call(RNVSeeder::class);
        $this->call(Rol_PermisoSeeder::class);
        $this->call(Usuario_FondoSeeder::class);
        $this->call(Usuario_MedidaSeeder::class);
        $this->call(Usuario_RNVSeeder::class);
        $this->call(Usuario_RolSeeder::class);
        $this->call(VoluntariadoSeeder::class);
    }
}
