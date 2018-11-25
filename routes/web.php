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

//oute::get('/','front\HomeController@endesarrollo')->name('home.desarrollo');
Route::get('/','front\HomeController@index')->name('home.index');


//Route::get('/arma-tu-mancha','front\HomeController@armatumancha')->name('home.armatumancha');

Route::get('/mira-el-status-de-tu-mancha','front\HomeController@miratustatus')->name('home.mirastatus');



//Route::get('/lista-mancha','front\HomeController@listamanchaingreso')->name('home.listamancha');

Route::post('/buscar-mancha','front\HomeController@buscarmancha')->name('home.buscarmancha');


//FILE
Route::get('/flat-file','front\HomeController@flatfile');
Route::get('/test1','front\HomeController@test1');
Route::get('/test2','front\RegisterController@testreg');

Route::get('/vercodigo','front\HomeController@vercodigo');
Route::post('/mostrarcodigo','front\HomeController@mostrarcodigo');

Route::get('/validar-pata-sms','front\HomeController@validarpatasms');
Route::post('/procesovalidarpata','front\HomeController@procesovalidapata')->name('home.procesovalidapata');

Route::get('/aceptarlider','front\HomeController@aceptarlider');
Route::post('/procesovalidarpata','front\HomeController@validarasignacion');
/*asincronos*/
//Route::post('/save-data-group','front\RegisterController@store')->name('register.store');



//Route::resource('consultas','ConsultaController');

//sesionado



Auth::routes();

Route::get('/gracias-gigas','front\RegisterController@graciasgigas')->name('home.graciasgigas');
Route::get('/gracias-millas','front\RegisterController@graciasmillas')->name('home.graciasmillas');
Route::get('/dashboard','front\RegisterController@listamanchaingreso')->name('home.listamancha');
Route::post('/lista-sesion-mancha','front\RegisterController@listamanchasesion')->name('home.listasesionmancha');


Route::post('/disponibilidad-mancha','front\RegisterController@disponibilidadmancha')->name('register.disponibilidadmancha');
Route::post('/validar-codigo','front\RegisterController@validarcodigo')->name('register.validarcodigo');

Route::post('/crear-pata','front\RegisterController@crearpata')->name('register.crearpata');
Route::post('/asignar-lider','front\RegisterController@asignarlider')->name('register.asignarlider');
Route::delete('/borrar-pata/{id}','front\RegisterController@borrarpata')->name('register.borrarpata');

Route::post('/validar-celular','front\RegisterController@validarcelular')->name('register.validarcelular');

Route::post('/recuperar-codigo','front\RegisterController@recuperarcodigo')->name('register.recuperarcodigo');

Route::post('/validar-codigo-recuperado','front\RegisterController@validarcodigorecuperado')->name('register.validarcodigorecuperado');

Route::get('/logout','front\HomeController@logout')->name('logout');

Route::get('/ingrese-celular','front\RegisterController@ingresecelular')->name('home.ingresecelular');

//Route::get('/home', 'HomeController@index')->name('home');
