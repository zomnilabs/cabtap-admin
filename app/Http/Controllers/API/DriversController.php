<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Vehicle;
use App\VehicleUser;
use Illuminate\Http\Request;

class DriversController extends Controller {
    public function getAssignedVehicle(Request $request)
    {
        $user = $request->user()->toArray();

        $vehicle = VehicleUser::where('user_id', $user['id'])
            ->where('status', 'active')->first();

        if (! $vehicle) {
            return response()->json([], 401);
        }

        $vehicle = Vehicle::where('id', $vehicle['vehicle_id'])
            ->first();

        return response()->json($vehicle, 200);
    }
}