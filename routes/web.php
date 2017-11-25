<?php

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

Route::get('/ejemplo', function(){
	$titulo = 'CHAO';
	$variable = false;
	return view('ejemplos.hola_mundo', compact(['titulo','variable','arreglo']));
});

Route::get('/estructura', function(){
	return view('ejemplos.estructura', compact(['titulo']));
});
/*
Route::post('usuario/', function(Request $request){
	User::create($request->all());
	return view
}
*/

Route::get('centrosdeacopio/{id_centro}/articulos/crear', 'ArticulosController@ingresarEnCentro');
Route::resource('centrosdeacopio', 'CentrosDeAcopioController');
Route::resource('centrosdeacopio.articulos', 'ArticulosController');


//Route::get('centrosdeacopio/asd', 'CentrosDeAcopioController@asd');

Auth::routes();

Route::get('/catastrofes/historial', 'CatastrofesController@historial')->name('historialCatastrofe');

Route::group(['middleware'=>['auth']], function(){
	// Administración

	Route::get('/administracion/listarUsuarios', 'AdministracionController@listar')->name('listarUsuarios');

	// Perfil

	Route::get('/perfil', 'HomeController@perfil_user')->name('perfil');
	Route::get('/infoPerfil', 'HomeController@infoPerfil')->name('infoPerfil');
	Route::post('update_usuario', 'HomeController@update_usuario');

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
	Route::get('/catastrofes/medidas/generatvoluntariado/{id}', 'MedidasController@createVoluntariado')->name('medida.createvoluntariado');
	Route::post('/catastrofes/medidas/generatevoluntariado/post/', 'MedidasController@storeVoluntariado')->name('medida.storeVoluntariado');
	//Centros
	Route::get('/medidas/centrodeacopio/', 'MedidasController@verCentros')->name('medida.verCentro');

	//Donaciones
	Route::get('/catastrofes/medidas/generatedonacion/{id}', 'DonacionesController@createDonacion')->name('medida.createDonacion');
	Route::post('/catastrofes/medidas/generatedonacion/post/', 'DonacionesController@storeDonacion')->name('medida.storeDonacion');
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


