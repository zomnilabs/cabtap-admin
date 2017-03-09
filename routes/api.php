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

Route::post('/auth', 'API\AuthenticateController@login');
Route::post('/register', 'API\PassengersController@register');

Route::get('/vehicles/{plateNumber}', 'API\VehiclesController@getVehicleByPlateNumber');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('vehicle', 'API\DriversController@getAssignedVehicle');
    Route::post('bookings', 'API\BookingsController@store');
    Route::patch('bookings/{bookingId}/status', 'API\BookingsController@chageStatus');
});
