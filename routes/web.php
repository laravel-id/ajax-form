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

// contact routes
Route::get('contact', 'MessageController@form')->name('contact.form');
Route::post('send', 'MessageController@send')->name('contact.send');

Auth::routes();

Route::get('/home', 'HomeController@index');
