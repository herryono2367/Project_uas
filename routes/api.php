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
//API CUSTOMER CONTROLLER

Route::get('customer','CustomerController@index');
Route::get('customer/create', 'CustomerController@create');
Route::post('customer/store', 'CustomerController@store');
Route::delete('/customers/{id}', 'CustomerController@destroy');
Route::patch('customer/update/{customer}', 'CustomerController@update')->name('customer.update');
Route::get('customer/edit/{id}', 'CustomerController@edit');

//API PAKET CONTROLLER

Route::get('password', function (){
   return bcrypt('admin');
});

Route::get('/paket','PaketController@index');
Route::get('/paket/{paket}','PaketController@show')->middleware('auth:api');
Route::delete('/paket/{paket}','PaketController@destroy')->middleware('auth:api');
Route::post('/paket/store', 'PaketController@store')->middleware('auth:api');
Route::patch('paket/{paket}', 'PaketController@update')->middleware('auth:api');

//CONTOH JWT
Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('wajib', 'AuthController@wajib');
});
