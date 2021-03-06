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
    return redirect()->to('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'Front', 'middleware' => 'auth'], function() {

    Route::get('/bookings/preview', 'BookingsController@preview');
    Route::get('/users/preview', 'UsersController@preview');
    Route::get('/passengers/preview', 'PassengerController@preview');
    Route::get('/drivers/preview', 'DriversController@preview');
    Route::get('/vehicles/preview', 'VehiclesController@preview');
    Route::get('/vehicle-maintenance/preview', 'VehicleMaintenancesController@preview');

    Route::resource('users', 'UsersController');
    Route::resource('passengers', 'PassengerController');
    Route::resource('drivers', 'DriversController');
    Route::resource('vehicles', 'VehiclesController');
    Route::resource('vehicle-maintenance', 'VehicleMaintenancesController');
    Route::resource('bookings', 'BookingsController');

});