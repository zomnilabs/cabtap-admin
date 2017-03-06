<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDriverRequest;
use App\User;
use App\Vehicle;
use App\VehicleUser;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = VehicleUser::all();

        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('user_group', 'driver')->get();
        $vehicles = Vehicle::all();

        return view('drivers.forms.create', compact('users', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDriverRequest $request)
    {
        $input = $request->all();
        $input['status'] = 'active';

        $driver = VehicleUser::create($input);

        return redirect('/drivers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('user_group', 'driver')->get();
        $vehicles = Vehicle::all();
        $driver = VehicleUser::where('id', $id)->first();

        return view('drivers.forms.update', compact('driver', 'users', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input['status'] = 'active';

        $driver = VehicleUser::where('id', $id)->first();

        $driver->update($input);

        return redirect('/drivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VehicleUser::where('id', $id)->delete();

        return redirect('/drivers');
    }
}
