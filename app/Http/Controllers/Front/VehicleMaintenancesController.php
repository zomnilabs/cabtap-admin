<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Vehicle;
use App\VehicleMaintenance;
use Illuminate\Http\Request;

class VehicleMaintenancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = VehicleMaintenance::all();

        return view('vehicle-maintenance.index', compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::all();

        return view('vehicle-maintenance.forms.create', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $maintenance = VehicleMaintenance::create($input);

        return redirect('/vehicle-maintenance');
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
        $vehicles = Vehicle::all();
        $maintenance = VehicleMaintenance::where('id', $id)->first();

        return view('vehicle-maintenance.forms.update', compact('vehicles', 'maintenance'));
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

        $maintenance = VehicleMaintenance::where('id', $id)->first();

        $maintenance->update($input);

        return redirect('/vehicle-maintenance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VehicleMaintenance::where('id', $id)->delete();

        return redirect('/vehicle-maintenance');
    }
}
