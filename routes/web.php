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

Route::group(['middleware' => 'admin'], function () {
	Route::get('/admin', 'Admin\UserController@index')->name('admin.user.index');
	Route::get('/admin/users', 'Admin\UserController@show')->name('admin.user.show');
	Route::get('/admin/users/{id}', 'Admin\UserController@edit')->name('admin.user.edit');
	Route::resource('/admin/users', 'Admin\UserController', ['except' => 'index', 'show', 'edit']);
});