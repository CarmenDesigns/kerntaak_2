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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/files', 'FileController@index')->name('files.index');

Route::post('file/upload', 'FileController@store')->name('file.upload');

Route::get('/files/edit/{id}','FileController@edit')->name('file.edit');

Route::put('/files/update/{id}','FileController@update')->name('file.update');

Route::post('upload', 'FileController@upload')->name('upload');

Route::delete('/files/destroy/{id}', 'FileController@destroy')->name('files.destroy');

Route::get('/files/{file}', 'FileController@show')->name('file.show');
