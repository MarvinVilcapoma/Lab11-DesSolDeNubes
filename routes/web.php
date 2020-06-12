<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','ContactoController@index')->name('inicio');

Route::post('/agregar','ContactoController@store')->name('store');

Route::get('/editar/{id}','ContactoController@edit')->name('editar');

Route::put('/update/{id}','ContactoController@update')->name('update');

Route::delete('/elminar/{id}','ContactoController@destroy')->name('eliminar');