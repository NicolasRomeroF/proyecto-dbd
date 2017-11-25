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
});
Route::get('/medidas/centrodeacopio/generate', 'MedidasController@createCentro')->name('createCentro');
Route::post('/medidas/centrodeacopio/generate/post', 'MedidasController@storeCentro')->name('medida.storeCentro');


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


