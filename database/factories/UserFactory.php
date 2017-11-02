<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    $ids_organizacion = \DB::table('organizacions')->select('id')->get();
    $id_organizacion = $ids_organizacion->random()->id;
    $ids_rol = \DB::table('rols')->select('id')->get();
    $id_rol = $ids_rol->random()->id;

    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'rut' => str_random(9),
        'fecha_nacimiento' => $faker->dateTime,
        'activo' => $faker->boolean,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'id_organizacion' => $id_organizacion,
        'id_rol' => $id_rol,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Organizacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->realText(200,2),
    ];
});

$factory->define(App\Rol::class, function (Faker $faker) {

    return [
        'nombre' => $faker->name,
        'detalle' => $faker->realText(200,2),
    ];
});

$factory->define(App\Region::class, function (Faker $faker) {

    return [
        'numero' => rand(1,13),
        'nombre' => $faker->state,
    ];
});

$factory->define(App\Ciudad::class, function (Faker $faker) {
    $ids_region = \DB::table('regions')->select('id')->get();
    $id_region = $ids_region->random()->id;

    return [
        'nombre' => $faker->state,
        'id_region' => $id_region,
    ];
});


$factory->define(App\Permiso::class, function (Faker $faker) {

    return [
        'nombre' => $faker->name,
    ];
});

$factory->define(App\Comuna::class, function (Faker $faker) {
    $ids_ciudad = \DB::table('ciudads')->select('id')->get();
    $id_ciudad = $ids_ciudad->random()->id;
    $ids_medida = \DB::table('medidas')->select('id')->get();
    $id_medida = $ids_comuna->random()->id;


    return [
        'nombre' => $faker->state,
        'id_ciudad' => $id_ciudad,
        'id_medida' => $id_medida,
    ];
});

$factory->define(App\Medida::class, function (Faker $faker) {

    $ids_user = \DB::table('users')->select('id')->get();
    $id_user = $ids_user->random()->id;

    return [
        'id_user' => $id_user,
        'nombre' => $faker->name,
        'descripcion' => $faker->realText(200,2),
        'direccion' => $faker->addres,
        'fecha_inicio' => $faker->dateTime(),
        'fecha_termino' => $faker->dateTime(),

    ];
});

$factory->define(App\Catastrofe::class, function (Faker $faker) {
    $ids_usuario = \DB::table('users')->select('id')->get();
    $id_usuario = $ids_usuario->random()->id;
    $tipos = array("Terremoto","Maremoto","Temblor","Aluvion","Incendio");
    return [
        'tipo' => array_rand($tipos,1),
        'fecha' => $faker->dateTime(),
        'id_user' => $id_usuario,
    ];
});

$factory->define(App\Voluntariado::class, function (Faker $faker) {
    $ids_ciudad = \DB::table('ciudads')->select('id')->get();
    $id_ciudad = $ids_rol->randomElement()->id;
    $ids_medida = \DB::table('medidas')->select('id')->get();
    $id_medida = $ids_rol->random()->id;
    $tipos = array("Salud","Rescate","Cocina");

    return [
        'id_medida' => $id_medida,
        'id_ciudad' => $id_ciudad,
        'cantidad_voluntarios' => rand(10,100),
        'labor' =>array_rand($tipos,1),
    ];
});

$factory->define(App\RNV::class, function (Faker $faker) {

    return [
        'rut' => $faker->cpr,
        'disponible' => $faker->boolean,
    ];
});

$factory->define(App\Historial_accion::class, function (Faker $faker) {
    $ids_user = \DB::table('users')->select('id')->get();
    $id_user = $ids_user->random()->id;

    $ids_medida = \DB::table('medidas')->select('id')->get();
    $id_medida = $ids_medida->random()->id;

    return [
        'id_user' => $id_user,
        'id_medida' =>$id_medida,


    ];
});

$factory->define(App\Evento_beneficio::class, function (Faker $faker) {
    $ids_ciudad = \DB::table('ciudads')->select('id')->get();
    $id_ciudad = $ids_ciudad->random()->id;

    $ids_medida = \DB::table('medidas')->select('id')->get();
    $id_medida = $ids_medida->random()->id;
    $tipo = array("Tipo1","Tipo2","Tipo3");

    return [
        'id_ciudad' => $id_ciudad,
        'id_medida' =>$id_medida,
        'tipo' => array_rand($tipo,1),

    ];
});

$factory->define(App\Producto::class, function (Faker $faker) {
    $ids_evento = \DB::table('evento_beneficios')->select('id')->get();
    $id_evento = $ids_evento->random()->id;

    return [
        'id_evento' => $id_evento,
        'nombre' => $faker->name,
        'stock' => rand(0,10),
        'precio' => rand(100,10000),
        'descripcion' => $faker->realText(200,2),

        
    ];
});

$factory->define(App\Centro_Acopio::class, function (Faker $faker) {
    $ids_medida = \DB::table('medidas')->select('id')->get();
    $id_medida = $ids_medida->random()->id;
    $situacion = array("Critica","Grave","Media","Leve");
    return [
        'id_medida' => $id_medida,
        'nombre' => $faker->name,
        'situacion' => array_rand($situacion,1),
        'descripcion' => $faker->realText(200,2),
    ];
});

$factory->define(App\Articulo::class, function (Faker $faker) {
    $ids_centro = \DB::table('centro_acopios')->select('id')->get();
    $id_centro = $ids_centro->random()->id;
    $tipo = array("Tipo1","Tipo2","Tipo3","Tipo4");
    return [
        'id_centro' => $id_centro,
        'nombre' => $faker->name,
        'cantidad' => rand(1,10),
        'tipo' => array_rand($tipo,1),
        'descripcion' => $faker->realText(200,2),
    ];
});

$factory->define(App\Fondo::class, function (Faker $faker) {
    $situacion = array("Banco1","Banco2");
    return [
        'nombre' => $faker->name,
        'fecha_inicio' => $faker->dateTime,
        'fecha_termino' => $faker->dateTime,
        'monto' => rand(1000,100000),
        'banco' => array_rand($banco,1),
        'descripcion' => $faker->realText(200,2),
        'cuenta' => "CuentaX",
    ];
});

$factory->define(App\Donacion::class, function (Faker $faker) {
    $ids_user = \DB::table('users')->select('id')->get();
    $id_user = $ids_user->random()->id;

    $ids_fondos = \DB::table('fondos')->select('id')->get();//REVISAR PLURAL
    $id_fondos = $ids_fondos->random()->id;
    return [
        'monto' => rand(1000,100000),
        'banco' => array_rand($banco,1),
        'cuenta' => "CuentaX",
        'id_user' => $id_user,
        'id_fondos' => $id_fondos
    ];
});

$factory->define(App\Usuario_RNV::class, function (Faker $faker) {
    $ids_user = \DB::table('users')->select('id')->get();
    $id_user = $ids_user->random()->id;

    $ids_voluntario = \DB::table('voluntariados')->select('id')->get();
    $id_voluntario = $ids_voluntarios->random()->id;
    return [
        'id_user' => $id_user,
        'id_voluntario' => $id_voluntario,
    ];
});

$factory->define(App\RNV_medida::class, function (Faker $faker) {
    $ids_medida = \DB::table('medidas')->select('id')->get();
    $id_medida = $ids_medida->random()->id;

    $ids_voluntario = \DB::table('voluntariados')->select('id')->get();
    $id_voluntario = $ids_voluntarios->random()->id;
    return [
        'id_medida' => $id_medida,
        'id_voluntario' => $id_voluntario,
    ];
});

$factory->define(App\Catastrofe_comuna::class, function (Faker $faker) {
    $ids_catastrofe = \DB::table('catastroves')->select('id')->get();
    $id_catastrofe = $ids_catastrofe->random()->id;

    $ids_comuna = \DB::table('comunas')->select('id')->get();
    $id_comuna = $ids_comuna->random()->id;
    return [
        'id_user' => $id_user,
        'id_voluntario' => $id_voluntario,
    ];
});

$factory->define(App\Usuario_fondo::class, function (Faker $faker) {
    $ids_user = \DB::table('users')->select('id')->get();
    $id_user = $ids_user->random()->id;

    $ids_fondos = \DB::table('fondos')->select('id')->get();//->reivsar plural
    $id_fondos = $ids_fondos->random()->id;
    return [
        'id_user' => $id_user,
        'id_fondos' => $id_fondos,
    ];
});

$factory->define(App\Usuario_medida::class, function (Faker $faker) {
    $ids_user = \DB::table('users')->select('id')->get();
    $id_user = $ids_user->random()->id;

    $ids_medida = \DB::table('medidas')->select('id')->get();
    $id_medida = $ids_medida->random()->id;
    return [
        'id_user' => $id_user,
        'id_medida' => $id_medida,
    ];
});

$factory->define(App\Comentario::class, function (Faker $faker) {
    $ids_user = \DB::table('users')->select('id')->get();
    $id_user = $ids_user->random()->id;

    $ids_medida = \DB::table('medidas')->select('id')->get();
    $id_medida = $ids_medida->random()->id;
    return [
        'id_user' => $id_user,
        'id_medida' => $id_medida,
        'comentario' => $faker->realText(200,2),
    ];
});