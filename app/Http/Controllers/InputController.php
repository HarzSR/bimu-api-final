<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceResource;
use App\Http\Resources\InputResource;
use App\Http\Resources\RecipeResource;
use App\Models\DefaultRecipe;
use App\Models\Device;
use App\Models\DeviceState;
use App\Models\Input;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return response('Invalid Request', 403);
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
    public function store(Request $request)
    {
        //

        // return response('Invalid Request', 403);

        $data = $request->all();

        if(isset($data["name"]))
        {
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
        else if(isset($data["temperature"]))
        {
            Input::create([
                'device_mac' => $data['mac_address'],
                'temperature' => $data['temperature'],
                'humidity' => $data['humidity'],
                'light' => $data['light'],
                'temperature_probe' => $data['temperature_probe'],
                'water_level' => $data['water_level'],
                'ec_probe' => $data['ec_probe'],
                'ph_probe' => $data['ph_probe'],
                'device_rtc' => $data['device_rtc'],
                'crc' => "",
                'status' => 1,
            ]);

            DeviceState::create([
                'device_mac' => $data['mac_address'],
                'user_id' => $data['user_id'],
                'device_status' => $data['status'],
            ]);

            return response()->json([
                'data' => [
                    'type' => 'Input',
                    'attributes' => [
                        'success' => 'Yes',
                    ]
                ]
            ], 200);
        }
        else if(isset($data["recipe_name"]))
        {
            $recipe = Recipe::create([
                'device_mac' => $data['device_mac'],
                'user_id' => $data['user_id'],
                'recipe_name' => $data['recipe_name'],
                'fog1_duration' => $data['fog1']['duration'],
                'fog1_on_minutes' => $data['fog1']['on'],
                'fog1_off_minutes' => $data['fog1']['off'],
                'fog1_start_time' => $data['fog1']['start'],
                'fog1_end_time' => $data['fog1']['end'],
                'fog2_duration' => $data['fog2']['duration'],
                'fog2_on_minutes' => $data['fog2']['on'],
                'fog2_off_minutes' => $data['fog2']['off'],
                'fog2_start_time' => $data['fog2']['start'],
                'fog2_end_time' => $data['fog2']['end'],
                'light1_red' => $data['light1']['red'],
                'light1_blue' => $data['light1']['blue'],
                'light1_green' => $data['light1']['green'],
                'light1_white' => $data['light1']['white'],
                'light1_bright' => $data['light1']['bright'],
                'light1_start_time' => $data['light1']['start'],
                'light1_end_time' => $data['light1']['end'],
                'light2_red' => $data['light2']['red'],
                'light2_blue' => $data['light2']['blue'],
                'light2_green' => $data['light2']['green'],
                'light2_white' => $data['light2']['white'],
                'light2_bright' => $data['light2']['bright'],
                'light2_start_time' => $data['light2']['start'],
                'light2_end_time' => $data['light2']['end'],
                'humidity' => $data['humidity'],
                'device_rtc' => $data['device_rtc'],
                'default' => 0,
                'status' => 0,
            ]);

            return (new RecipeResource($recipe))->response()->setStatusCode(200);
        }

        // Storage::disk('local')->put('example.txt', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Input  $input
     * @return \Illuminate\Http\Response
     */
    public function show($mac)
    {
        //

        $checkDevice = Device::where(['mac_address' => $mac, 'user_id' => auth('api')->user()->id])->count();

        if($checkDevice == 1)
        {
            $inputCount = Input::where(['device_mac' => $mac])->count();

            if($inputCount > 0)
            {
                $input = Input::latest()->where(['device_mac' => $mac])->first();

                return (new InputResource($input))->response()->setStatusCode(200);
            }
            else
            {
                return response()->json([
                    'id' => null,
                    'type' => 'Input',
                    'attributes' => [
                        'device_mac' => null,
                        'temperature' => null,
                        'humidity' => null,
                        'light' => null,
                        'temperature_probe' => null,
                        'water_level' => null,
                        'ec_probe' => null,
                        'ph_probe' => null,
                        'device_rtc' => null,
                        'crc' => null,
                        'success' => 'Yes',
                    ]
                ], 200);
            }
        }
        else
        {

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Input  $input
     * @return \Illuminate\Http\Response
     */
    public function edit(Input $input)
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Input  $input
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Input $input)
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Input  $input
     * @return \Illuminate\Http\Response
     */
    public function destroy(Input $input)
    {
        //

        return response('Invalid Request', 403);
    }

    public function viewInputs()
    {
        Session::put('page', 'view-inputs');

        $inputs = Input::with('device')->latest()->take(1000)->get();
        // $inputs = Input::with('device')->latest()->get();

        return view('admin.inputs.view_inputs')->with(compact('inputs'));
    }
}
