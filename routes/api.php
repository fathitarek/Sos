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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//
Route::resource('cities', 'API\cityAPIController');
//
//Route::resource('regions', 'regionAPIController');
//
//
//
//Route::resource('locations', 'locationsAPIController');
//
//Route::resource('roles', 'roleAPIController');
//
//Route::resource('routes', 'routeAPIController');

Route::get('/get_doctors_by_specialties/{id}', 'API\phoneAPIController@index');
Route::resource('specialties', 'API\specialtyAPIController');

Route::resource('employers', 'API\employerAPIController');

Route::resource('insurance_companies', 'API\insuranceCompanyAPIController');

Route::resource('menu_items', 'API\menuItemsAPIController');

Route::get('/activateDoctor', 'API\DoctorAPIController@setDoctorActive');
Route::get('/deactivateDoctor', 'API\DoctorAPIController@setDoctorInactive');

Route::get('/getAuth', 'API\DoctorAPIController@getUser');


Route::resource('visits', 'visitAPIController');