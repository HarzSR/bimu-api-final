<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use App\Http\Requests\StoreLocationsRequest;
use App\Http\Requests\UpdateLocationsRequest;
use Session;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function show(Locations $locations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function edit(Locations $locations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocationsRequest  $request
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationsRequest $request, Locations $locations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locations $locations)
    {
        //
    }

    public function addLocations(Request $request)
    {
        Session::put('page', 'add-locations');

        if($request->isMethod('POST'))
        {
            $data = $request->all();

            Locations::create(['location_name' => $data['name'], 'location_latlong' => $data['location'], 'begin_date' => $data['begin_date'], 'end_date' => $data['end_date'], 'status' => '1']);

            return redirect()->back()->with('success_message', 'Location Added Successful');
        }

        return view('admin.locations.add_locations');
    }

    public function viewLocations()
    {
        Session::put('page', 'view-locations');

        // $devices = Device::with('user')->where(['status' => 1])->get();
        $locations = Locations::get();

        return view('admin.locations.view_locations')->with(compact('locations'));
    }
}
