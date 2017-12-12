<?php

Route::get('/', 'PaginasController@inicio');
Route::get('/nosotros', 'PaginasController@nosotros');
//Route::get('/productos', 'PaginasController@productos');
//Route::get('/servicios', 'PaginasController@servicios');

Route::resource('/perfiles','PerfilesController');
Route::resource('/cupones','CuponesController');
Route::resource('/servicios','ServiciosController');
Route::resource('/productos','ProductosController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');