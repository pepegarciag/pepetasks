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
$telegramToken = env('TELEGRAM_BOT_TOKEN');

Route::group(['middleware' => 'auth.basic'], function () {
    Route::view('/', 'welcome');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/event', 'EventsController@add')->name('addEvent');
    Route::get('/event/{task}', 'EventsController@get')->name('getEvent');
    Route::patch('/event/{task}', 'EventsController@edit')->name('editEvent');
    Route::delete('/event/{task}', 'EventsController@delete')->name('deleteEvent');
});

Route::post("/{$telegramToken}/webhook", function () {
    Telegram::commandsHandler(true);

    return 'ok';
});