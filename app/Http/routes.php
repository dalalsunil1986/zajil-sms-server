<?php

Route::group(['prefix' => 'api/v1', 'middleware' =>'api', 'namespace' => 'Api'], function () {
    Route::resource('messages', 'MessageController');
    Route::resource('buffets', 'BuffetController');
    Route::get('buffets/{id}/packages', 'BuffetController@getPackages');
    Route::resource('halls', 'HallController');
    Route::resource('photographers', 'PhotographerController');
    Route::resource('guest_services', 'GuestServiceController');
    Route::resource('light_services', 'LightServiceController');
    Route::resource('orders', 'OrderController');
    Route::resource('payments', 'PaymentController');
});

/*********************************************************************************************************
 * Admin Routes
 ********************************************************************************************************/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::resource('message', 'MessageController');
    Route::resource('buffet', 'BuffetController');
    Route::get('/', 'HomeController@index');
});

/**
 * Font End Routes
 */
Route::group([], function () {
    Route::auth();
    Route::resource('pay','PaymentController');
    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');
});