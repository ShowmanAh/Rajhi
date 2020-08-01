<?php

use Illuminate\Support\Facades\Route;

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
define('paginate_number', 10);

Auth::routes();
###### auth admin route ####
Route::group(['namespace' => 'Dashboard','middleware'=> 'auth:admin'], function () {
   Route::get('/', 'DashboardController@index')->name('dashboard.index');
## begin languages route ###
Route::group(['prefix' => 'languages'], function () {
   Route::get('/', 'LanguageController@index')->name('admin.languages');
   Route::get('/create', 'LanguageController@create')->name('admin.languages.create');
   Route::post('/store', 'LanguageController@store')->name('admin.languages.store');
   Route::get('/edit/{id}', 'LanguageController@edit')->name('admin.languages.edit');
   Route::post('/update/{id}', 'LanguageController@update')->name('admin.languages.update');
   Route::get('/destroy/{id}', 'LanguageController@destroy')->name('admin.languages.destroy');
});
### end languages route ###

## begin Specialization route ###
Route::group(['prefix' => 'specializations'], function () {
    Route::get('/', 'SpecializationController@index')->name('admin.specializations');
    Route::get('/create', 'SpecializationController@create')->name('admin.specializations.create');
    Route::post('/store', 'SpecializationController@store')->name('admin.specializations.store');
    Route::get('/edit/{id}', 'SpecializationController@edit')->name('admin.specializations.edit');
    Route::post('/update/{id}', 'SpecializationController@update')->name('admin.specializations.update');
    Route::get('/destroy/{id}', 'SpecializationController@destroy')->name('admin.specializations.destroy');
 });
 ### end specialization route ###

 ## begin SubSpecialization route ###
Route::group(['prefix' => 'subspecializations'], function () {
    Route::get('/', 'SubSpecializationController@index')->name('admin.subspecializations');
    Route::get('/create', 'SubSpecializationController@create')->name('admin.subspecializations.create');
    Route::post('/store', 'SubSpecializationController@store')->name('admin.subspecializations.store');
    Route::get('/edit/{id}', 'SubSpecializationController@edit')->name('admin.subspecializations.edit');
    Route::post('/update/{id}', 'SubSpecializationController@update')->name('admin.subspecializations.update');
    Route::get('/destroy/{id}', 'SubSpecializationController@destroy')->name('admin.subspecializations.destroy');
 });
 ### end Subspecialization route ###
 ## begin insurance route ###
Route::group(['prefix' => 'insurance'], function () {
    Route::get('/', 'InsuranceCompanyController@index')->name('admin.insurance');
    Route::get('/create', 'InsuranceCompanyController@create')->name('admin.insurance.create');
    Route::post('/store', 'InsuranceCompanyController@store')->name('admin.insurance.store');
    Route::get('/edit/{id}', 'InsuranceCompanyController@edit')->name('admin.insurance.edit');
    Route::post('/update/{id}', 'InsuranceCompanyController@update')->name('admin.insurance.update');
    Route::get('/destroy/{id}', 'InsuranceCompanyController@destroy')->name('admin.insurance.destroy');
 });
 ### end insurance route ###
 ## begin services route ###
Route::group(['prefix' => 'services'], function () {
    Route::get('/', 'ServicesController@index')->name('admin.services');
    Route::get('/create', 'ServicesController@create')->name('admin.services.create');
    Route::post('/store', 'ServicesController@store')->name('admin.services.store');
    Route::get('/edit/{id}', 'ServicesController@edit')->name('admin.services.edit');
    Route::post('/update/{id}', 'ServicesController@update')->name('admin.services.update');
    Route::get('/destroy/{id}', 'ServicesController@destroy')->name('admin.services.destroy');
 });
 ### end services route ###
 Route::group(['prefix' => 'doctors'], function () {
    Route::get('/', 'DoctorController@index')->name('admin.doctors');
    Route::get('/create', 'DoctorController@create')->name('admin.doctors.create');
    Route::post('/store', 'DoctorController@store')->name('admin.doctors.store');
    Route::get('/edit/{id}', 'DoctorController@edit')->name('admin.doctors.edit');
    Route::post('/update/{id}', 'DoctorController@update')->name('admin.doctors.update');
    Route::get('/destroy/{id}', 'DoctorController@destroy')->name('admin.doctors.destroy');
    Route::get('/{id}','DoctorController@show' )->name('admin.doctors.show');

 });
 ### end cities route ###
 Route::group(['prefix' => 'cities'], function () {
    Route::get('/', 'CityController@index')->name('admin.cities');
    Route::get('/create', 'CityController@create')->name('admin.cities.create');
    Route::post('/store', 'CityController@store')->name('admin.cities.store');
    Route::get('/edit/{id}', 'CityController@edit')->name('admin.cities.edit');
    Route::post('/update/{id}', 'CityController@update')->name('admin.cities.update');
    Route::get('/destroy/{id}', 'CityController@destroy')->name('admin.cities.destroy');
 });
 ### end cities route ###
 ### begin areas route ###
 Route::group(['prefix' => 'areas'], function () {
    Route::get('/', 'AreaController@index')->name('admin.areas');
    Route::get('/create', 'AreaController@create')->name('admin.areas.create');
    Route::post('/store', 'AreaController@store')->name('admin.areas.store');
    Route::get('/edit/{id}', 'AreaController@edit')->name('admin.areas.edit');
    Route::post('/update/{id}', 'AreaController@update')->name('admin.areas.update');
    Route::get('/destroy/{id}', 'AreaController@destroy')->name('admin.areas.destroy');
 });
 ### end areas route ###
 ### begin centers route ###
 Route::group(['prefix' => 'centers'], function () {
    Route::get('/', 'CentersController@index')->name('admin.centers');
    Route::get('/create', 'CentersController@create')->name('admin.centers.create');
    Route::post('/store', 'CentersController@store')->name('admin.centers.store');
    Route::get('/edit/{id}', 'CentersController@edit')->name('admin.centers.edit');
    Route::post('/update/{id}', 'CentersController@update')->name('admin.centers.update');
    Route::get('/destroy/{id}', 'CentersController@destroy')->name('admin.centers.destroy');
    Route::get('/{id}','CentersController@show' )->name('admin.centers.show');
 });
 ### end centers route ###
});

### guest admin route ###
Route::group(['namespace' => 'Dashboard', 'middleware'=> 'guest:admin'], function () {

    Route::get('/login', 'AdminController@getLogin')->name('admin.getlogin');
    Route::post('/login', 'AdminController@login')->name('admin.postlogin');

    ## end admin login route ###
 });
 Route::get('getSubspecializations' , 'Dashboard\DoctorController@getSubspecializations')->name('getSubspecializations');
 Route::get('doctors/getSub/{id}' , 'Dashboard\DoctorController@getSub')->name('getSub');
 Route::post('/subchildren', [
    'as'   => 'children.categories',
    'uses' => 'Dashboard\DoctorController@childrenCategory',
  ]);
  Route::get('/category-dropdown' , 'Dashboard\DoctorController@categoryDropDownData')->name('getDropdown');
