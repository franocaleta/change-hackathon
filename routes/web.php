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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/owner', 'OwnerController@index');
Route::post('/confirmCreator/{id}', 'OwnerController@confirmCreator');

Route::get('/event/all', 'EventController@index');

Route::get('/event/{eventId}/attendants', 'EventController@attendants');


Route::post('/event/create', 'EventController@store');

Route::get('/allEvents', 'EventController@index');
Route::get('/createEvent', 'EventController@create');

Route::get('/search','EventController@search');


Route::get('/user/attend/{eventId}', 'UserController@attend');