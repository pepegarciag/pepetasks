<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::get('events/{event}', 'Api\EventsController@show');
    Route::post('users/login', 'Api\UsersController@login');
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::get('events', 'Api\EventsController@index');
    Route::post('/events', 'Api\EventsController@add')->name('addEvent');
    Route::get('/events/{event}', 'Api\EventsController@show')->name('getEvent');
    Route::patch('/events/{event}', 'Api\EventsController@edit')->name('editEvent');
    Route::delete('/events/{event}', 'Api\EventsController@delete')->name('deleteEvent');
});