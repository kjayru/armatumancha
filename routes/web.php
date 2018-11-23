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

Route::get('/','front\HomeController@endesarrollo')->name('home.desarrollo');
Route::get('/inicio','front\HomeController@index')->name('home.index');
Route::get('/arma-tu-mancha','front\HomeController@armatumancha')->name('home.armatumancha');
Route::get('/mira-el-status-de-tu-mancha','front\HomeController@miratustatus')->name('home.armatumancha');



Route::post('/lista-mancha','front\HomeController@listamanchaingreso')->name('home.listamancha');

//sesionado
Route::post('/lista-sesion-mancha','front\HomeController@listamanchasesion')->name('home.listasesionmancha');

//FILE
Route::get('/flat-file','front\HomeController@flatfile');
//Route::get('/test1','front\HomeController@test1');
Route::get('/test2','front\RegisterController@testreg');

/*asincronos*/
Route::post('/save-data-group','front\RegisterController@store')->name('register.store');

Route::post('/disponibilidad-mancha','front\RegisterController@disponibilidadmancha')->name('register.disponibilidadmancha');
Route::post('/validar-codigo','front\RegisterController@validarcodigo')->name('register.validarcodigo');

Route::post('/crear-pata','front\RegisterController@crearpata')->name('register.crearpata');
Route::put('/asignar-lider/{id}','front\RegisterController@asignarlider')->name('register.asignarlider');
Route::delete('/borrar-pata/{id}','front\RegisterController@borrarpata')->name('register.borrarpata');

Route::post('/validar-celular','front\RegisterController@validarcelular')->name('register.validarcelular');

Route::post('/recuperar-codigo','front\RegisterController@recuperarcodigo')->name('register.recuperarcodigo');

Route::post('/validar-codigo-recuperado','front\RegisterController@validarcodigorecuperado')->name('register.validarcodigorecuperado');


//Route::resource('consultas','ConsultaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
