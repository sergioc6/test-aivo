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

Route::get('/', function () {
    return view('inicio');
})->name('/');

Route::get('/obtener_tweets', 'TwitterController@obtenerTweets')->name('obtener_tweets');

Route::post('/descargar_tweets', 'TwitterController@descargarTweets')->name('descargar_tweets');

Route::get('/configuracion', 'TwitterController@configuracion')->name('configuracion');

Route::post('/guardar_configuracion', 'TwitterController@guardarConfiguracion')->name('guardar_configuracion');

Route::get('/consultar_tweets', 'TwitterController@consultarTweets')->name('consultar_tweets');
