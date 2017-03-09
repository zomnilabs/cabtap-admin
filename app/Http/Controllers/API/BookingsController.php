<?php
namespace App\Http\Controllers\API;

use App\Booking;
use App\Http\Controllers\Controller;
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
}