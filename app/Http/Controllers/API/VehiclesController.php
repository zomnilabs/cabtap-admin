<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Vehicle;
use App\VehicleUser;

class VehiclesController extends Controller {
   public function getVehicleByPlateNumber($plateNumber)
   {
       // get vehicle information
       $vehicle = Vehicle::where('plate_number', $plateNumber)
           ->where('status', 'active')
           ->first();

       if (! $vehicle) {
           return response()->json('vehicle not found', 400);
       }

       // get driver
       $driver = VehicleUser::with('user.profile', 'vehicle')
           ->where('vehicle_id', $vehicle->id)
           ->where('status', 'active')
           ->first();

       if (! $driver) {
           return response()->json('no driver ready for this vehicle', 400);
       }

       return response()->json($driver, 200);
   }

   public function updateVehicleStatus($plateNumber)
   {
       $vehicle = Vehicle::where('plate_number', $plateNumber)
           ->where('status', 'active')
           ->first();

       if (! $vehicle) {
           return response()->json('vehicle not found', 400);
       }

       // get driver
       VehicleUser::where('vehicle_id', $vehicle->id)->update(['status' => 'active']);

       $driver = VehicleUser::with('user.profile', 'vehicle')
           ->where('vehicle_id', $vehicle->id)
           ->where('status', 'active')
           ->first();

       return response()->json($driver, 200);
   }
}