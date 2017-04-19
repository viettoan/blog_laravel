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
    return View::make('admin.add-user', array('name' => 'Taylor'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/admin/user/create', 'AddUserController@create')->name('user.create');
Route::post('/admin/user/create', 'AddUserController@store')->name('user.store');
Route::get('/admin/user', 'AddUserController@index')->name('user.index');
Route::get('/admin/user/{id}', 'AddUserController@destroy')->name('user.destroy');
//Route::get('/admin/user/{user}', 'AddUserController@show')->name('user.show');
Route::get('/admin/user/{id}/edit', 'AddUserController@edit')->name('user.edit');
Route::post('/admin/user/{id}', 'AddUserController@update')->name('user.update');


//Route::resource('admin/test', 'AddUserController' );

