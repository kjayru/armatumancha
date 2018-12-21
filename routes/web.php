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

Route::get('/','front\HomeController@index')->name('home.index');
Route::get('/mira-el-status-de-tu-mancha','front\HomeController@miratustatus')->name('home.mirastatus');
Route::post('/buscar-mancha','front\HomeController@buscarmancha')->name('home.buscarmancha');
Route::get('/validarpatasms','front\HomeController@validarpatasms');

Route::post('/acepto-participar','front\HomeController@aceptoParticipacion');
Route::get('/aceptarlider','front\HomeController@aceptarlider');
Route::post('/procesovalidarpata','front\HomeController@validarasignacion');
//FILE
Route::get('/flat-file','front\HomeController@flatfile');
Route::get('/test1','front\HomeController@test1');
Route::get('/test2','front\RegisterController@testreg');

Route::get('/vercodigo','front\HomeController@vercodigo');
Route::post('/mostrarcodigo','front\HomeController@mostrarcodigo');

Route::get('/preguntas-frecuentes','front\HomeController@preguntas')->name('home.preguntas');
Route::get('/tips','front\HomeController@tips')->name('home.tips');

Route::get('/reportes-usuario','front\HomeController@reporteExcel');

Route::post('/reportes-usuario','front\HomeController@reporteExcelGen')->name('front.reporte');

/*asincronos*/
Route::post('/comprobar-cel','front\HomeController@comprobarCel');

Route::post('/comprobar-cel-pata','front\RegisterController@comprobarCelPata');

Route::post('/comprobar-alias','front\RegisterController@comprobarAlias');

Route::post('/disponibilidad-mancha','front\HomeController@disponibilidadmancha')->name('register.disponibilidadmancha');
//sesionado

Route::get('jobEvaluated','front\HomeController@jobEvaluated');
Route::get('jobEvaluated2','front\HomeController@jobEvaluated2');

Auth::routes();

Route::get('/gracias-gigas','front\RegisterController@graciasgigas')->name('home.graciasgigas');
Route::get('/gracias-millas','front\RegisterController@graciasmillas')->name('home.graciasmillas');
Route::get('/dashboard','front\RegisterController@listamanchaingreso')->name('home.listamancha');
Route::post('/lista-sesion-mancha','front\RegisterController@listamanchasesion')->name('home.listasesionmancha');



Route::post('/validar-codigo','front\RegisterController@validarcodigo')->name('register.validarcodigo');

Route::post('/crear-pata','front\RegisterController@crearpata')->name('register.crearpata');

Route::post('/asignar-lidermancha','front\RegisterController@asignarlidermancha')->name('register.asignarlider');

Route::delete('/borrar-pata/{id}','front\RegisterController@borrarpata')->name('register.borrarpata');

Route::post('/validar-celular','front\RegisterController@validarcelular')->name('register.validarcelular');

Route::post('/recuperar-codigo','front\RegisterController@recuperarcodigo')->name('register.recuperarcodigo');

Route::post('/validar-codigo-recuperado','front\RegisterController@validarcodigorecuperado')->name('register.validarcodigorecuperado');

Route::get('/logout','front\HomeController@logout')->name('logout');

Route::get('/ingrese-celular','front\RegisterController@ingresecelular')->name('home.ingresecelular');

