<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthenticateRequest;
use App\User;
use App\VehicleUser;

class AuthenticateController extends Controller
{
    public function login(AuthenticateRequest $request)
    {
        $input = $request->all();
        $user = \Auth::attempt(['email' => $input['email'], 'password' => $input['password']]);
        if ($user) {
            $user = User::with('profile')->where('email', $input['email'])->first();

            return response()->json($user, 200);
        } else {
            return response()->json([], 401);
        }
    }
}