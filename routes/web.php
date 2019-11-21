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


Route::get('/api/tasks', 'TaskController@index');
Route::post('/api/task/create', 'TaskController@store');
Route::get('/api/task/edit/{id}', 'TaskController@edit');
Route::post('/api/task/update/{id}', 'TaskController@update');
Route::delete('/api/task/delete/{id}', 'TaskController@delete');
Route::get('/{any}', 'HomeController@index')->where('any', '.*')->name('home');