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

Route::get('/cities', 'CitiesController@index')->middleware('admin');

Route::get('/cities/add', 'CitiesController@add')->middleware('admin');
Route::post('/cities/add', 'CitiesController@create')->middleware('admin');

Route::get('/cities/edit/{id}', 'CitiesController@show')->middleware('admin');
Route::post('/cities/edit/{id}', 'CitiesController@update')->middleware('admin');

Route::get('/cities/delete/{id}', 'CitiesController@delete')->middleware('admin');
//--------------------------------------------------------------------------------------

//Clinics page routes
Route::get('/clinics', 'ClinicsController@index')->middleware('admin');

Route::get('/clinics/add', 'ClinicsController@add')->middleware('admin');
Route::post('/clinics/add', 'ClinicsController@create')->middleware('admin');

Route::get('/clinics/edit/{id}', 'ClinicsController@show')->middleware('admin');
Route::post('/clinics/edit/{id}', 'ClinicsController@update')->middleware('admin');

Route::get('/clinics/delete/{id}', 'ClinicsController@delete')->middleware('admin');




Route::get('/clinics/show-sections/{id}', 'ClinicsController@showAssociateSections')->middleware('admin')->name('showSections');
Route::get('/clinics/add-sections/{id}', 'ClinicsController@formAssociateSections')->middleware('admin');
Route::post('/clinics/add-sections/{id}', 'ClinicsController@associateSections')->middleware('admin');


//--------------------------------------------------------------------------------------

//Section page routes
Route::get('/sections', 'SectionsController@index')->middleware('admin');

Route::get('/sections/add', 'SectionsController@add')->middleware('admin');
Route::post('/sections/add', 'SectionsController@create')->middleware('admin');

Route::get('/sections/edit/{id}', 'SectionsController@show')->middleware('admin');
Route::post('/sections/edit/{id}', 'SectionsController@update')->middleware('admin');

Route::get('/sections/delete/{id}', 'SectionsController@delete')->middleware('admin');
//--------------------------------------------------------------------------------------

//Medic page routes
Route::get('/medics', 'MedicsController@index')->middleware('admin');

Route::get('/medics/add', 'MedicsController@add')->middleware('admin');
Route::post('/medics/add', 'MedicsController@create')->middleware('admin');

Route::get('/medics/edit/{id}', 'MedicsController@show')->middleware('admin');
Route::post('/medics/edit/{id}', 'MedicsController@update')->middleware('admin');

Route::get('/medics/delete/{id}', 'MedicsController@delete')->middleware('admin');
//--------------------------------------------------------------------------------------


//Users page routes
Route::get('/users', 'UsersController@index')->middleware('medic');
Route::get('/users/filter', 'UsersController@filterUsers')->middleware('medic');
Route::post('/users/filter', 'UsersController@filterUsers')->middleware('medic');


//Route::get('/users/add', 'UsersController@add')->middleware('medic');
//Route::post('/users/add', 'UsersController@create')->middleware('medic');

Route::get('/users/edit/{id}', 'UsersController@show')->middleware('admin');
Route::post('/users/edit/{id}', 'UsersController@update')->middleware('admin');

//Route::get('/users/delete/{id}', 'UsersController@delete')->middleware('medic');
//--------------------------------------------------------------------------------------

//Appointments routes
Route::get('/appointments', 'AppointmentsController@index')->middleware('admin');

Route::get('/appointments/add', 'AppointmentsController@add')->middleware('admin');
Route::post('/appointments/add', 'AppointmentsController@create')->middleware('admin');

Route::get('/appointments/edit/{id}', 'AppointmentsController@show')->middleware('admin');
Route::post('/appointments/edit/{id}', 'AppointmentsController@update')->middleware('admin');

Route::get('/appointments/approve/{id}', 'AppointmentsController@showUpdateStatus')->middleware('admin');
Route::post('/appointments/approve/{id}', 'AppointmentsController@updateStatus')->middleware('admin');

Route::get('/appointments/delete/{id}', 'AppointmentsController@delete')->middleware('admin');

//--------------------------------------------------------------------------------------


//Records routes
//Route::get('/records', 'RecordsController@index')->middleware('auth');

//Route::get('/records/add', 'RecordsController@add')->middleware('auth');
//Route::post('/records/add', 'RecordsController@create')->middleware('auth');

//Route::get('/records/edit/{id}', 'RecordsController@show')->middleware('auth');
//Route::post('/records/edit/{id}', 'RecordsController@update')->middleware('auth');
//
//Route::get('/records/delete/{id}', 'RecordsController@delete')->middleware('auth');

Route::get('/records/show-records/{id}', 'RecordsController@showRecords')->middleware('medic')->name('showRecords');
Route::get('/records/add-records/{id}', 'RecordsController@addRecords')->middleware('medic');
Route::post('/records/add-records/{id}', 'RecordsController@createRecords')->middleware('medic')->name('addRecords');


//--------------------------------------------------------------------------------------
