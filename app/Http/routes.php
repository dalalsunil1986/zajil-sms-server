<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('messages', 'MessageController');
    Route::resource('buffets', 'BuffetController');
    Route::resource('halls', 'HallController');
    Route::resource('photographers', 'PhotgrapherController');
    Route::resource('guest_services', 'GuestServiceController');
    Route::resource('light_services', 'LightServiceController');
    Route::resource('orders', 'OrderController');
});
