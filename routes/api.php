<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::namespace('Api')->group(function () {

    // Route::get('file/{path}', 'ApiController@read_file')->name("api.file");

    Route::namespace('Auth')->group(function () {
        Route::post('register', 'RegisterController@register');
        Route::post('login', 'LoginController@login');
    });

    Route::as('vehicle.')->prefix("vehicle")->group(function () {
        Route::get('index', 'VehicleController@index');
        Route::match(["get" , "post"],'search', 'VehicleController@search');
        Route::get('information', 'VehicleController@info');
        Route::as('auth.')->prefix("auth")->middleware('auth:api')->group(function () {
        });
    });

    Route::as('route-category.')->prefix("route-category")->group(function () {
        Route::match(["get" , "post"],'list', 'RouteController@list');
    });

    Route::as('route.')->prefix("route")->group(function () {
        Route::match(["get" , "post"],'calculate-price', 'RouteController@calculate_price');
    });

    Route::as('order.')->prefix("order")->middleware("auth:api")->group(function () {
        Route::match(["get" , "post"],'history', 'OrderController@history');
        Route::post('initiate', 'OrderController@initiate');
        Route::post('complete', 'OrderController@complete');
    });

    Route::as('profile.')->prefix("profile")->middleware("auth:api")->group(function () {
        Route::post('update', 'UserController@update');
    });
});
