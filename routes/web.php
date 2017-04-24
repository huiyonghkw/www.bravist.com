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

Route::get('/home', 'HomeController@index');

Route::group([
				'prefix' => 'admin', 
				'namespace' => 'Admin', 
				'middleware' => 'web'
			], function () {

	Route::get('register', 'Auth\RegisterController@index')->name('register.admin');
	Route::post('register', 'Auth\RegisterController@store');
	Route::get('login', 'Auth\LoginController@index')->name('login.admin');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout.admin');
	Route::get('dashboard', 'DashboardController@index');
});
