<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Cities page routes
Route::get('/home', 'HomeController@index');

Route::get('/cities', 'CitiesController@index')->middleware('auth');

Route::get('/cities/add', 'CitiesController@add')->middleware('auth');
Route::post('/cities/add', 'CitiesController@create')->middleware('auth');

Route::get('/cities/edit/{id}', 'CitiesController@show')->middleware('auth');
Route::post('/cities/edit/{id}', 'CitiesController@update')->middleware('auth');

Route::get('/cities/delete/{id}', 'CitiesController@delete')->middleware('auth');
//--------------------------------------------------------------------------------------

//Clinics page routes
Route::get('/clinics', 'ClinicsController@index')->middleware('auth');

Route::get('/clinics/add', 'ClinicsController@add')->middleware('auth');
Route::post('/clinics/add', 'ClinicsController@create')->middleware('auth');

Route::get('/clinics/edit/{id}', 'ClinicsController@show')->middleware('auth');
Route::post('/clinics/edit/{id}', 'ClinicsController@update')->middleware('auth');

Route::get('/clinics/delete/{id}', 'ClinicsController@delete')->middleware('auth');
//--------------------------------------------------------------------------------------

//Section page routes
Route::get('/sections', 'SectionsController@index');

Route::get('/sections/add', 'SectionsController@add')->middleware('auth');
Route::post('/sections/add', 'SectionsController@create')->middleware('auth');

Route::get('/sections/edit/{id}', 'SectionsController@show')->middleware('auth');
Route::post('/sections/edit/{id}', 'SectionsController@update')->middleware('auth');

Route::get('/sections/delete/{id}', 'SectionsController@delete')->middleware('auth');
//--------------------------------------------------------------------------------------

//Medic page routes
Route::get('/medics', 'MedicsController@index')->middleware('auth');

Route::get('/medics/add', 'MedicsController@add')->middleware('auth');
Route::post('/medics/add', 'MedicsController@create')->middleware('auth');

Route::get('/medics/edit/{id}', 'MedicsController@show')->middleware('auth');
Route::post('/medics/edit/{id}', 'MedicsController@update')->middleware('auth');

Route::get('/medics/delete/{id}', 'MedicsController@delete')->middleware('auth');
//--------------------------------------------------------------------------------------




Route::get('/users', 'UsersController@index');
Route::get('/appointments', 'AppointmentsController@index');
Route::get('/records', 'RecordsController@index');
