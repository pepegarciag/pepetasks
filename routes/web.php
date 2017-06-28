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

Route::post('/task', 'TasksController@add')->name('addTask');
Route::get('/task/{task}', 'TasksController@get')->name('getTask');
Route::patch('/task/{task}', 'TasksController@edit')->name('editTask');
Route::delete('/task/{task}', 'TasksController@delete')->name('deleteTask');