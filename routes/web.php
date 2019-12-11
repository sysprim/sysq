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
    return view('index');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Panel', 'AdministradorController@index')->name('panel');
Route::get('/Turno', 'AdministradorController@turno')->name('turno');

Route::get('/config', 'UserController@index')->name('config');

Route::get('/detalle/{id}' ,'UserController@detalle')->name('detalle');
Route::get('/User/Eliminar/{id}','UserController@delete')->name('eliminar');

Route::post('/cliente/registrar', 'ClienteController@save')->name('registrar.cliente');



