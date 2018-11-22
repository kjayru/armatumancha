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
Route::get('/arma-tu-mancha','front\HomeController@armaTuMancha')->name('home.armatumancha');
Route::get('/consulta-tu-mancha','front\HomeController@consultaTuMancha')->name('home.armatumancha');
