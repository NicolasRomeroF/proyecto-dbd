<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client();
    	$json = $client->request('GET', 'https://apis.modernizacion.cl/dpa/regiones?orderBy=codigo&orderDir=asc&geolocation=false', ['verify' => false]);
        $regiones = json_decode($json->getbody());
        foreach ($regiones as $region) {
            $reg = new Region();
            $reg->nombre = $region->nombre;
            $reg->save();
        }
    }
}
