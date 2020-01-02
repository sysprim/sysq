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
Route::post('/Panel/Query' , 'AdministratorController@queryTurn')   ->name('panel.turn');
Route::get('/Panel/First' , 'AdministratorController@firstTurn')   ->name('panel.first');
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
Route::get('/Ticket/ActDes/{id}/{status}',  'TicketController@statusTicket') ->name('status.ticket');

//Attention

Route::post('/Attention/Save' , 'AttentionController@save'   )        ->name('save.attention');

//Client

Route::post('/Client/Save', 'ClientController@save')  ->name('save.client');

//Turn
Route::post('/Turn/Call', 'TurnController@turnCall')             ->name('call.turn');
Route::post('/Turn/Finally', 'TurnController@turnFinally')       ->name('finally.turn');
Route::post('/Turn/Cancel', 'TurnController@turnCancel')         ->name('cancel.turn');
Route::post('/Turn/Start', 'TurnController@turnStart')         ->name('start.turn');
Route::post('/Turn/Reset'     ,'TurnController@turnReset')       ->name('reset.turn');
Route::post('/Turn/Reset/Ticket' ,'TurnController@turnResetTicket') ->name('reset.ticket.turn');
Route::post('/Turn/CallMe' ,'TurnController@turnCallMe') ->name('read.turn');
Route::post('/Turn/Waiting' ,'TurnController@turnWaiting') ->name('read.waiting.turn');
Route::get('/Turn/Attending' ,'TurnController@turnAttending') ->name('read.attending.turn');


//Video
Route::get('/Video/Register'     ,'VideoController@register')   ->name('register.video');
Route::post('/Video/Save'     ,  'VideoController@save')        ->name('save.video');
Route::get('/Video'     ,  'VideoController@index')             ->name('index.video');
Route::post('/Video/Delete'     ,'VideoController@delete')  ->name('delete.video');
Route::get('/Video/Search/{id}'     ,'VideoController@search')  ->name('search.video');
Route::get('/Video/{filename}', 'VideoController@getVideo')     ->name('view.video');









