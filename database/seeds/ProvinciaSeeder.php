<?php

use Illuminate\Database\Seeder;
use App\Provincia;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client();
        $json = $client->request('GET', 'https://apis.modernizacion.cl/dpa/provincias?orderBy=codigo&orderDir=asc&geolocation=false', ['verify' => false]);
        $provincias = json_decode($json->getbody());
        $regionActual = 1;
        $codigoRegion = $provincias[0]->codigo_padre;
        foreach ($provincias as $provincia) {
            $prov = new Provincia();
            $prov->nombre = $provincia->nombre;
            if ($codigoRegion != $provincia->codigo_padre) {
                $codigoRegion = $provincia->codigo_padre;
                $regionActual++;
            }
            $prov->id_region = $regionActual;
            $prov->save();
        }
    }
}
