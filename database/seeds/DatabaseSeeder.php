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


        //$this->call(OrganizacionSeeder::class);
        //$this->call(RolSeeder::class);
        //$this->call(UserSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(ComunaSeeder::class);
        $this->call(MedidaSeeder::class);
        $this->call(CatastrofeSeeder::class);
        $this->call(VoluntariadoSeeder::class);
        $this->call(RNVSeeder::class);
        $this->call(HistorialSeeder::class);
        $this->call(Evento_beneficioSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(Centro_AcopioSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(FondoSeeder::class);
        $this->call(DonacionSeeder::class);
        $this->call(Usuario_RNVSeeder::class);
        $this->call(RNV_MedidaSeeder::class);
        $this->call(Usuario_FondoSeeder::class);
        $this->call(Rol_PermisoSeeder::class);
        $this->call(Usuario_MedidaSeeder::class);
        $this->call(DireccionSeeder::class);
        $this->call(Usuario_RolSeeder::class);
    }
}
