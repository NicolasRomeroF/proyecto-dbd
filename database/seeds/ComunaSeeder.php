<?php

use Illuminate\Database\Seeder;
use App\Comuna;

class ComunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$client = new \GuzzleHttp\Client();
        $json = $client->request('GET', 'https://apis.modernizacion.cl/dpa/comunas?orderBy=codigo&orderDir=asc&geolocation=false', ['verify' => false]);
        $comunas = json_decode($json->getbody());
        $provinciaActual = 1;
        $codigoProvincia = $comunas[0]->codigo_padre;
        foreach ($comunas as $comuna) {
            $com = new Comuna();
            $com->nombre = $comuna->nombre;
            if ($codigoProvincia != $comuna->codigo_padre) {
                $codigoProvincia = $comuna->codigo_padre;
                $provinciaActual++;
            }
            $com->id_provincia = $provinciaActual;
            $com->save();
        }
    }
}
