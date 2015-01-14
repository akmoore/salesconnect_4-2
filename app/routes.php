<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('users', 'UserController');
Route::resource('agencies', 'AgencyController');
Route::resource('clients', 'ClientController');
Route::resource('projects', 'ProjectController');
Route::resource('aes', 'AeController');