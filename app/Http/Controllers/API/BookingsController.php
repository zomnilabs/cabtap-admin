<?php
namespace App\Http\Controllers\API;

use App\Booking;
use App\Http\Controllers\Controller;
use App\VehicleUser;
use Illuminate\Http\Request;

class BookingsController extends Controller {
    public function store(Request $request)
    {
        $user = $request->user()->toArray();
        $input = $request->all();
        $input['user_id'] = $user['id'];
        $input['status']  = 'pending';
        $input['vehicle_user_id'] = 0;

        \Log::info($input);

        $booking = Booking::create($input);

        if (! $booking) {
            return response()->json('failed', 400);
        }

        return response()->json($booking, 201);
    }

    public function chageStatus(Request $request, $bookingId, $status)
    {
        $user = $request->user()->toArray();
        $vehicleUser = VehicleUser::where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        $booking = Booking::where('id', $bookingId)
            ->update(['status', $status, 'vehicle_user_id' => $vehicleUser->id]);

        $booking = Booking::find($bookingId);

        // Update driver status
        if ($status === 'accepted') {
            VehicleUser::where('user_id', $user->id)
                ->where('status', 'active')
                ->update(['status' => 'on-trip']);
        }

        if ($status === 'cancel' || $status === 'completed') {
            VehicleUser::where('user_id', $user->id)
                ->where('status', 'on-trip')
                ->update(['status' => 'active']);
        }

        return response()->json($booking, 200);
    }
}