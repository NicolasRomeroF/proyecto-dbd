<?php

use Illuminate\Support\Facades\Input;
use App\Region;
use App\Provincia;
use App\Comuna;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Get: Paso de datos por URL
Post:
*/
Route::get('/', 'WelcomeController@home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Facebook
Route::get('/auth/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/auth/callback', 'SocialAuthFacebookController@callback');

/*
Route::post('usuario/', function(Request $request){
	User::create($request->all());
	return view
}
*/
//Route::get('centrosdeacopio/asd', 'CentrosDeAcopioController@asd');
Auth::routes();
Route::get('/RNV/listado', 'RNVController@listado')->name('listadoVoluntarios');
Route::get('/RNV/voluntariosDisponibles', 'RNVController@disponibles')->name('listadoVoluntariosDisponibles');
Route::get('/RNV/voluntario/{id}', 'RNVController@mostrarDetalle');
Route::get('/catastrofes/historial', 'CatastrofesController@historial')->name('historialCatastrofe');
Route::group(['middleware'=>['auth']], function(){
    // Administración
    Route::get('/administracion/listarUsuarios', 'AdministracionController@listar')->name('listarUsuarios');
    Route::get('/administracion/usuario/{id}', 'AdministracionController@mostrarDetalle');
    Route::get('/administracion/crearUsuario', 'AdministracionController@mostrarCrearUser');
    Route::post('/administracion/crearUsuario/post', 'AdministracionController@crearUser')->name('administracion.crear');
    Route::post('/administracion/usuario/{id}/post', 'AdministracionController@banearUsuario')->name('administracion.banear');
    // Perfil
    Route::get('/perfil', 'HomeController@perfil_user')->name('perfil');
    Route::get('/infoPerfil', 'HomeController@infoPerfil')->name('infoPerfil');
    Route::post('update_usuario', 'HomeController@update_usuario');
    //RNV
    Route::post('/RNV/voluntario/{id}/post', 'RNVController@cambiarEstadoVoluntario')->name('RNV.cambiar');
    // Catastrofes
    Route::get('/catastrofes/add', 'CatastrofesController@index')->name('addCatastrofe');
    Route::post('/catastrofes/add/post', 'CatastrofesController@store')->name('catastrofe.store');
    Route::get('/catastrofes/{id}', 'CatastrofesController@show');
    // Medidas
    Route::get('/medidas/generate', 'MedidasController@index')->name('generateMedida');
    Route::post('/medidas/generate/post', 'MedidasController@store')->name('medida.store');
    Route::get('/catastrofes/medidas/{id}', 'MedidasController@verMedidasCatastrofe');
    Route::get('/catastrofes/medidas/generatecentro/{id}', 'MedidasController@createCentro')->name('medida.createCentro');
    Route::post('/catastrofes/medidas/generatecentro/post/', 'MedidasController@storeCentro')->name('medida.storeCentro');
    Route::get('/catastrofes/medidas/generatebeneficio/{id}', 'MedidasController@createBeneficio')->name('medida.createBeneficio');
    Route::post('/catastrofes/medidas/generatebeneficio/post/', 'MedidasController@storeBeneficio')->name('medida.storeBeneficio');
    Route::get('/catastrofes/medidas/generatevoluntariado/{id}', 'MedidasController@createVoluntariado')->name('medida.createvoluntariado');
    Route::post('/catastrofes/medidas/generatevoluntariado/post/', 'MedidasController@storeVoluntariado')->name('medida.storeVoluntariado');
    Route::get('/medidas/centrodeacopio/', 'MedidasController@verCentros')->name('medida.verCentro');
    Route::get('/medidas/eventobeneficio/', 'MedidasController@verBeneficios')->name('medida.verBeneficios');
    Route::get('/medidas/voluntariado/', 'MedidasController@verVoluntariados')->name('medida.verVoluntariados');
    Route::get('/medidas/fondo/', 'FondosController@verFondos')->name('fondo.verFondos');
    //Centros

    Route::get('centrosdeacopio/{id_centro}/articulos/crear', 'ArticulosController@ingresarEnCentro');
    Route::resource('centrosdeacopio', 'CentrosDeAcopioController');
    Route::resource('centrosdeacopio.articulos', 'ArticulosController');
    Route::get('centrosdeacopio/{id_centro}/articulos/crear', 'ArticulosController@ingresarEnCentro');
    Route::resource('centrosdeacopio', 'CentrosDeAcopioController');
    Route::resource('centrosdeacopio.articulos', 'ArticulosController');
    Route::get('centrosdeacopio/{id}', 'MedidasController@show_centro');
    Route::get('/medidas/centrosdeacopio/{id}/edit', 'MedidasController@edit_centro');
    Route::post('/medidas/centrosdeacopio/update', 'MedidasController@update_centro')->name('medidas.update_centro');

    //Comentarios

    Route::post('/medidas/eventobeneficio/{id}/comentarios/guardar', 'ComentariosController@guardar')->name('guardarComentario');
    Route::get('/medidas/eventobeneficio/{id}/comentarios/comentar', 'ComentariosController@comentar');
    Route::get('/medidas/eventobeneficio/{id}/comentarios/mostrar', 'ComentariosController@mostrar')->name('mostrarComentario');
    Route::resource('medidas.comentarios', 'ComentariosController');


    //Eventos
    Route::get('/medidas/eventobeneficio/{id}', 'MedidasController@show_evento');
    Route::get('/medidas/eventobeneficio/{id}/edit', 'MedidasController@edit_evento');
    Route::post('/medidas/eventobeneficio/update', 'MedidasController@update_evento')->name('medidas.update_evento');

    //Voluntariado
    Route::get('/medidas/voluntariado/{id}', 'MedidasController@show_voluntariado');
    Route::get('/medidas/voluntariado/{id}/edit', 'MedidasController@edit_voluntariado');
    Route::post('/medidas/voluntariado/update', 'MedidasController@update_voluntariado')->name('medidas.update_voluntariado');

    //Donaciones
    Route::get('/catastrofes/medidas/generatedonacion/{id}', 'DonacionesController@createDonacion')->name('donaciones.createDonacion');
    Route::post('/catastrofes/medidas/generatedonacion/post/', 'DonacionesController@storeDonacion')->name('donaciones.storeDonacion');
    //Fondo
    Route::get('/catastrofes/medidas/generatefondo/{id}', 'FondosController@createFondo')->name('medida.createFondo');
    Route::post('/catastrofes/medidas/generatefondo/post/', 'FondosController@storeFondo')->name('medida.storeFondo');
});
Route::get('/medidas/historial', 'MedidasController@historial')->name('historialMedida');
//Auth
Route::get('/auth/login', function(){
    return view('/auth/login');
});
Route::get('/auth/register', function(){
    return view('/auth/register');
});
//Test
Route::get('/test/datepicker', function () {
    return view('datepicker');
});
Route::post('/test/save', ['as' => 'save-date',
    'uses' => 'DateController@showDate',
    function () {
        return '';
    }]);
Route::get('/test/mapa2', function () {
    return view('test/mapa2');
});
Route::get('/test/mapa', function () {
    return view('test/mapa');
});
Route::get('/test/mapa3', function () {
    return view('test/mapa3');
});
Route::get('/informacion', 'WelcomeController@infRedirect')->name('informacion');


//Twitter
Route::get('twitterUserTimeLine', 'TwitterController@twitterUserTimeLine');
Route::post('tweet', ['as'=>'post.tweet','uses'=>'TwitterController@tweet']);
Route::get('/test/map', function(){
    return view('test/mapa');
});
Route::get('/test/map2', function(){
    return view('test/mapa2');
});

Route::get('/provincias',function(){
   $id =  Input::get('id_region');
   $provincias = Provincia::where('id_region','=',$id)->get();
   return $provincias->pluck('nombre','id')->all();
});

Route::get('/comunas',function(){
   $id =  Input::get('id_provincia');
   $comunas = Comuna::where('id_provincia','=',$id)->get();
   return $comunas->pluck('nombre','id')->all();
});