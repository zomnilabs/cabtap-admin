<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Vehicle;
use App\VehicleMaintenance;
use App\VehicleUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeVehicle = Vehicle::where('status', 'active')
            ->count();

        $today = Carbon::today('Asia/Manila')->toDateString();
        $vehicleUnderMaintenance = VehicleMaintenance::whereDate('scheduled_date', '=', $today)
            ->count();

        $completedTrips = Booking::whereDate('created_at', '=', $today)
            ->where('status', 'completed')
            ->count();

        $recentlyCompletedTrips = Booking::whereDate('created_at', '=', $today)
            ->where('status', 'completed')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('home')
            ->with('active_vehicle', $activeVehicle)
            ->with('vehicle_under_maintenance', $vehicleUnderMaintenance)
            ->with('completed_trips', $completedTrips)
            ->with('bookings', $recentlyCompletedTrips);
    }
}
