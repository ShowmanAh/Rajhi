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
Route::group([
    'midleware' => 'api',
    'namespace' => 'Api'
], function ($router) {
    // ======= begin general routes ======
  Route::get('specializations', 'GeneralController@specialization');
  Route::get('specializations/{id}', 'GeneralController@show');
  Route::get('subspecializations', 'GeneralController@subspecialization');
  Route::get('subspecializations/{id}', 'GeneralController@getsubspecialization');
  Route::get('insurance_company', 'GeneralController@insuranceCompany');
  Route::get('cities', 'GeneralController@cities');
  Route::get('areas/{id}', 'GeneralController@areas');
  Route::get('specialization_with_sub', 'GeneralController@specialization_with_sub');
  Route::get('city_with_areas', 'GeneralController@city_with_areas');
 // ======= end general routes =======

 // ==== begin specialization routes =========
      Route::get('specialization', 'SpecializationController@index');
      Route::get('specialization/{id}', 'SpecializationController@show');
      Route::post('specialization', 'SpecializationController@store');
      Route::post('specialization/{id}', 'SpecializationController@update');
      Route::get('specialization/{id}/delete', 'SpecializationController@destroy');
 // end specialization routes =============
// ==== begin subspecialization routes =========
Route::get('subspecialization', 'SubSpecializationController@index');
Route::get('subspecialization/{id}', 'SubSpecializationController@show');
Route::post('subspecialization', 'SubSpecializationController@store');
Route::post('subspecialization/{id}', 'SubSpecializationController@update');
Route::get('subspecialization/{id}/delete', 'SubSpecializationController@destroy');
// end subspecialization routes =============
// ==== begin insurancecompanies routes =========
Route::get('insurancecompanies', 'InsuranceCompanyController@index');
Route::get('insurancecompanies/{id}', 'InsuranceCompanyController@show');
Route::post('insurancecompanies', 'InsuranceCompanyController@store');
Route::post('insurancecompanies/{id}', 'InsuranceCompanyController@update');
Route::get('insurancecompanies/{id}/delete', 'InsuranceCompanyController@destroy');
// end insurancecompanies routes =============
// ==== begin city routes =========
Route::get('city', 'CityController@index');
Route::get('city/{id}', 'CityController@show');
Route::post('city', 'CityController@store');
Route::post('city/{id}', 'CityController@update');
Route::get('city/{id}/delete', 'CityController@destroy');
// end city routes =============
// ==== begin city routes =========
Route::get('area', 'AreaController@index');
Route::get('area/{id}', 'AreaController@show');
Route::post('area', 'AreaController@store');
Route::post('area/{id}', 'AreaController@update');
Route::get('area/{id}/delete', 'AreaController@destroy');
// end city routes =============
// ==== begin dates routes =========
Route::get('dates', 'DateController@index');
Route::get('dates/{id}', 'DateController@show');
Route::post('dates', 'DateController@store');
Route::post('dates/{id}', 'DateController@update');
Route::get('dates/{id}/delete', 'DateController@destroy');
//====== end dates routes =============
// ==== begin doctors routes =========
Route::get('doctors', 'DoctorController@index');
Route::get('doctors/{id}', 'DoctorController@show');
Route::post('doctors', 'DoctorController@store');
Route::post('doctors/{id}', 'DoctorController@update');
Route::get('doctors/{id}/delete', 'DoctorController@destroy');
//============== end doctors routes ================
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
