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
//
//Route::get('api/users', function () {
//    return view('welcome');
//});


Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => 'cors'], function () {
        Route::get('api/login', 'LoginController@login');
        Route::get('api/countries', 'CountryController@index');
        Route::get('api/devices', 'DeviceController@store');
        Route::get('api/subscriptions', 'SubscriptionsController@index');
        Route::get('api/subscriptions/{id}', 'SubscriptionsController@show');
        Route::get('api/cards', 'CardController@index');
        Route::get('api/cards/{id}', 'CardController@show');
        Route::get('api/cards-update/{id}', 'CardController@update');
        Route::get('api/shoppers-update/{id}', 'ShopperController@update');
    });
});




