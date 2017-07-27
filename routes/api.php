<?php

use Illuminate\Http\Request;
use App\API\Api;
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

Route::middleware('guest')->get('/test',function(){
    return "ok";
});

// Auth routes
Route::middleware('guest')->post('/login', 'Auth\LoginController@apiLogin');
Route::middleware('guest')->post('/register', 'Auth\RegisterController@apiRegister');

// Cities routes
Route::middleware('guest')->get('/cities', 'CitiesController@apiIndex');
Route::middleware('guest')->get('/cities/{id}', 'CitiesController@apiShow');
Route::middleware('guest')->post('/cities', 'CitiesController@apiCreate');
Route::middleware('guest')->post('/cities/{id}', 'CitiesController@apiUpdate');
Route::middleware('guest')->delete('/cities/{id}', 'CitiesController@apiDestroy');


Route::middleware('guest')->get('/clinics', 'ClinicsController@apiIndex');
Route::middleware('guest')->get('/clinics/{id}', 'ClinicsController@apiShow');
Route::middleware('guest')->post('/clinics', 'ClinicsController@apiCreate');
Route::middleware('guest')->post('/clinics/{id}', 'ClinicsController@apiUpdate');
Route::middleware('guest')->delete('/clinics/{id}', 'ClinicsController@apiDestroy');



Route::middleware('guest')->get('/clinics/{id}/sections', 'SectionsController@apiGetSectionsByClinic');
Route::middleware('guest')->get('/sections/{id}/clinics', 'SectionsController@apiGetClinicsBySection');
Route::middleware('guest')->get('/clinics-sections/{id}/{sectionId}/medics', 'MedicsController@apiGetMedicBySectionAndClinic');



