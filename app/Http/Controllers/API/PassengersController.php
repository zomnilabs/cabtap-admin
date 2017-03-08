<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegistrationRequest;
use App\User;

class PassengersController extends Controller {
    public function register(RegistrationRequest $request)
    {
        $user = $request->only('email', 'password');
        $profile = $request->only('profile');
        \Log::info($request->all());

        $result = null;
        \DB::transaction(function() use ($profile, $user, &$result) {
            $user['api_token']  = str_random(60);
            $user['fcm_token']  = str_random(60);

            $user = User::create($user);
            $user->profile()->create($profile['profile']);

            $result = User::with('profile')
                ->where('id', $user->id)
                ->first();
        });

        return response()->json($result, 201);
    }
}