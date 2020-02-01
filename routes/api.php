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


Route::post('register', 'UserController@register');
Route::post('login', 'Api\UserController@login');
Route::group(['middleware' => 'jwt.auth'], function ($router) {
	//les routes associé au fournisseurs=partners
	Route::post('partners/create','Api\PartnerController@store');
	Route::get('partners/','Api\PartnerController@index')->name('partners');
	Route::delete('partners/delete/{id}','Api\PartnerController@destroy');
	Route::post('partners/modify/{id}','Api\PartnerController@update')->name('partner.update');
	//les routes associé au villes=cities
	Route::post('cities/create','Api\CityController@store');
	Route::get('cities/','Api\CityController@index')->name('partners');
	Route::delete('cities/delete/{id}','Api\CityController@destroy');
	Route::post('cities/modify/{id}','Api\CityController@update')->name('partner.update');

});