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

//Administrator

Route::get('/Panel' , 'AdministratorController@panel'   )           ->name('panel');
Route::get('/Panel/{id}' , 'AdministratorController@selectedPanel') ->name('panel.select');
Route::get('/Turn'  , 'AdministratorController@turn'    )           ->name('turn'); 
Route::get('/Config', 'AdministratorController@config'  )           ->name('config');

//User
Route::get('/User/Detail/{id}'  ,'UserController@detail')       ->name('detail.user'); 
Route::post('/User/Delete',  'UserController@delete')           ->name('delete.user'); 
Route::post('/User/Password',  'UserController@passwordUpdate') ->name('password.user');
Route::post('/User/Update', 'UserController@update')            ->name('update.user'); //cambio

//Ticket
Route::get('/Ticket/Register' , 'TicketController@register'   ) ->name('register.ticket');
Route::post('/Ticket/Save' , 'TicketController@save'   )        ->name('save.ticket');
Route::get('/Ticket/Detail/{id}'  ,'TicketController@detail')   ->name('detail.ticket');
Route::post('/Ticket/Update', 'TicketController@update')        ->name('update.ticket'); 
Route::post('/Ticket/Delete',  'TicketController@delete')       ->name('delete.ticket'); 

//Client

Route::post('/Client/Save', 'ClientController@save')  ->name('save.client');

//Turn
Route::get('/Turn/Index/{ci}'  ,'TurnController@index')->name('index.turn');




