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
	//les routes associé au Delivery time
	//Route::post('delivery-times/create','Api\DeliveryTimeController@store');
	Route::post('cities/{city_id}/delivery-times ','Api\DeliveryTimeController@store');
    //cette route et pour exclurer les jours-off d'une ville donné
    Route::get('cities/{city_id}/exclude-day','Api\DeliveryTimeController@excludeDay');
    //{number_of_days}=1
    //{number_of_days}=2 aujourd'hui et le lendemain etc
    Route::get('cities/{city_id}/delivery-dates-times/{number_of_days}','Api\DeliveryTimeController@availableDeliveryTime');
});