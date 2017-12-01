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
    return view('welcome');
});

Route::get('/nosotros', 'PaginasController@nosotros');
//Route::get('/productos', 'PaginasController@productos');
//Route::get('/servicios', 'PaginasController@servicios');

Route::resource('/perfiles','PerfilesController');
Route::resource('/cupones','CuponesController');
Route::resource('/servicios','ServiciosController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');