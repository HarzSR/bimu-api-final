<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceRequest;
use App\Http\Resources\DeviceResource;
use App\Models\DefaultRecipe;
use App\Models\Device;
use App\Models\Input;
use App\Models\Recipe;
use Illuminate\Http\Request;
use DB;
use Session;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $devices = Device::where(['user_id' => auth('api')->user()->id])->get();
        $deviceCount = Device::where(['user_id' => auth('api')->user()->id])->count();

        if($deviceCount == 0)
        {
            return response()->json([
                'data' => [
                    'id' => null,
                    'type' => 'Device',
                    'attributes' => [
                        'name' => null,
                        'device_mac' => null,
                        'user_id' => null,
                        'status' => null,
                        'success' => 'No',
                    ]
                ]
            ], 200);
        }
        else
        {
            return (DeviceResource::collection($devices))->response()->setStatusCode(200);
        }

        // return response('Invalid Request', 403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        //

        $data = $request->all();

        $device = Device::create([
            'name' => $data['name'],
            'mac_address' => $data['mac_address'],
            'user_id' => $data['user_id'],
            'status' => $data['status'],
        ]);

        $defaultRecipes = DefaultRecipe::get();

        app('App\Http\Controllers\RecipeController')->create($data, $defaultRecipes);

        return (new DeviceResource($device))->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show($mac)
    {
        //

        $device = Device::latest()->where(['mac_address' => $mac, 'user_id' => auth('api')->user()->id])->first();

        if(empty($device))
        {
            return response()->json([
                'data' => [
                    'id' => null,
                    'type' => 'Device',
                    'attributes' => [
                        'name' => null,
                        'device_mac' => null,
                        'user_id' => null,
                        'status' => null,
                        'success' => 'No',
                    ]
                ]
            ], 200);
        }
        else
        {
            return (new DeviceResource(($device)))->response()->setStatusCode(200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update($mac, Request $request)
    {
        //

        $data = $request->all();

        Device::where(['mac_address' => $mac, 'user_id' => auth('api')->user()->id])->update(['name' => $data["name"], 'status' => $data["status"]]);

        $device = Device::where(['mac_address' => $mac, 'user_id' => auth('api')->user()->id])->first();

        return (new DeviceResource(($device)))->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($mac)
    {
        //

        if(Device::where(['mac_address' => $mac])->delete())
        {
            Recipe::where(['device_mac' => $mac, 'user_id' => auth('api')->user()->id])->delete();

            Input::where(['device_mac' => $mac])->delete();

            return response()->json([
                'data' => [
                    'type' => 'Device',
                    'attributes' => [
                        'success' => 'Yes',
                    ]
                ]
            ], 200);
        }
        else
        {
            return response()->json([
                'data' => [
                    'type' => 'Device',
                    'attributes' => [
                        'success' => 'No',
                        'message' => 'Missing Device',
                    ]
                ]
            ], 200);
        }
    }

    public function viewDevices()
    {
        Session::put('page', 'view-devices');

        // $devices = Device::with('user')->where(['status' => 1])->get();
        $devices = Device::with('user')->get();

        return view('admin.devices.view_devices')->with(compact('devices'));
    }
}
