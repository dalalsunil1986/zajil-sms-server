<?php

Route::group(['prefix' => 'api/v1', 'middleware' =>'api', 'namespace' => 'Api'], function () {

    Route::post('auth/login', 'Auth\AuthController@postLogin');
//    Route::post('auth/register', 'Auth\AuthController@postRegister');
//    Route::post('auth/activate', 'Auth\AuthController@postActivate');
    Route::post('auth/login/token', 'Auth\AuthController@loginUsingToken');
    
    Route::resource('messages', 'MessageController');
    Route::resource('buffets', 'BuffetController');
    Route::get('buffets/{id}/packages', 'BuffetController@getPackages');
    Route::resource('halls', 'HallController');
    Route::resource('photographers', 'PhotographerController');
    Route::resource('guest_services', 'GuestServiceController');
    Route::resource('light_services', 'LightServiceController');
    Route::resource('orders', 'OrderController',['only'=>['index','store']]);
    Route::resource('ads', 'AdController',['only'=>['index']]);
    Route::post('orders/edit', 'OrderController@editOrder');
    Route::post('orders/delete', 'OrderController@deleteOrder');
    Route::get('user/{id}/services', 'UserController@getServices');
    Route::get('user/{id}/orders', 'UserController@getOrders');
    Route::post('services/activate', 'UserController@activateService');
    Route::get('services/check-availability',['as'=>'service.availability','uses'=>'ServiceController@checkAvailability']);
    Route::post('services/block-date',['as'=>'service.block_date','uses'=>'ServiceController@blockDate']);

//    Route::post('payment/success','PaymentController@paymentSuccess');
    Route::get('payment/process','PaymentController@paymentProcess');
    Route::get('payment/curl','PaymentController@paymentCurl');
    Route::get('payment/completed','PaymentController@completed');
    Route::get('payment/success',['as'=>'payment.success','uses'=>'PaymentController@getSuccess']);
    Route::post('payment/success',['as'=>'payment.success.post','uses'=>'PaymentController@postSuccess']);
    Route::get('payment/failure',['as'=>'payment.failure','uses'=>'PaymentController@getFailure']);
    Route::get('payment/end',['as'=>'payment.end','uses'=>'PaymentController@endPayment']);
    Route::get('payment/end',['as'=>'payment.end','uses'=>'PaymentController@endPayment']);
    Route::get('hall/checkavailability',['as'=>'hall.availability','uses'=>'HallController@checkAvailability']);
    Route::resource('payments', 'PaymentController');
    Route::post('orders/edit','OrderController@editOrder');
});

/*********************************************************************************************************
 * Admin Routes
 ********************************************************************************************************/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::resource('message', 'MessageController');
    Route::get('buffet/{id}/packages', 'BuffetController@getPackages');
    Route::get('buffet/packages/{id}/show', 'BuffetController@getPackage');
    Route::post('buffet/{id}/package/create', 'BuffetController@createPackage');
    Route::post('package/{id}/edit', 'BuffetController@editPackage');
    Route::get('package/{id}/delete', 'BuffetController@deletePackage');
    Route::resource('buffet', 'BuffetController');
    Route::resource('ad', 'AdController');

    Route::resource('hall', 'HallController');
    Route::resource('order', 'OrderController');
    Route::resource('photographer', 'PhotographerController');
    Route::resource('guest-service', 'GuestServiceController');
    Route::resource('light-service', 'LightServiceController');
    Route::resource('user', 'UserController');
    Route::post('user/attach-service','UserController@attachService');
    Route::post('user/detach-service','UserController@detachService');
    Route::get('/', 'HomeController@index');
});

/**
 * Font End Routes
 */
Route::group([], function () {
    Route::auth();
    Route::get('/home', ['as'=>'home','uses'=>'HomeController@index']);
    Route::get('/', 'HomeController@index');
});

Route::get('test',function(){
    // services =  ['photogrpaher','guestService']
//    Mail::send('z4ls@live.com',[],function(){
//       return 'z';
//    });
    Mail::send('emails.test', [], function ($m)  {
        $m->from('zajil.knet1@gmail.com', 'Your Application');
        $m->to('z4ls@live.com')->subject('Your Reminder!');
    });
});