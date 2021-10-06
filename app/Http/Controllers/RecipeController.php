<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipeResource;
use App\Models\DefaultRecipe;
use App\Models\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // return (RecipeResource::collection(DefaultRecipe::all()))->response()->setStatusCode(200);

        return response('Invalid Request', 403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($data, $recipes)
    {
        //

        foreach ($recipes as $recipe)
        {
            Recipe::create([
                'device_mac' => $data['mac_address'],
                'user_id' => $data['user_id'],
                'recipe_name' => $recipe['recipe_name'],
                'fog1_duration' => $recipe['fog1_duration'],
                'fog1_on_minutes' => $recipe['fog1_on_minutes'],
                'fog1_off_minutes' => $recipe['fog1_off_minutes'],
                'fog1_start_time' => $recipe['fog1_start_time'],
                'fog1_end_time' => $recipe['fog1_end_time'],
                'fog2_duration' => $recipe['fog2_duration'],
                'fog2_on_minutes' => $recipe['fog2_on_minutes'],
                'fog2_off_minutes' => $recipe['fog2_off_minutes'],
                'fog2_start_time' => $recipe['fog2_start_time'],
                'fog2_end_time' => $recipe['fog2_end_time'],
                'light1_red' => $recipe['light1_red'],
                'light1_blue' => $recipe['light1_blue'],
                'light1_green' => $recipe['light1_green'],
                'light1_white' => $recipe['light1_white'],
                'light1_bright' => $recipe['light1_bright'],
                'light1_start_time' => $recipe['light1_start_time'],
                'light1_end_time' => $recipe['light1_end_time'],
                'light2_red' => $recipe['light2_red'],
                'light2_blue' => $recipe['light2_blue'],
                'light2_green' => $recipe['light2_green'],
                'light2_white' => $recipe['light2_white'],
                'light2_bright' => $recipe['light2_bright'],
                'light2_start_time' => $recipe['light2_start_time'],
                'light2_end_time' => $recipe['light2_end_time'],
                'humidity' => $recipe['humidity'],
                'device_rtc' => Carbon::now()->toDateTimeString(),
                'default' => $recipe['default'],
                'status' => 0,
            ]);
        }
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

        $data = $request->all();

        $recipe = Recipe::create([
            'device_mac' => $data['device_mac'],
            'user_id' => $data['user_id'],
            'recipe_name' => $data['recipe_name'],
            'fog1_duration' => $data['fog1_duration'],
            'fog1_on_minutes' => $data['fog1_on_minutes'],
            'fog1_off_minutes' => $data['fog1_off_minutes'],
            'fog1_start_time' => $data['fog1_start_time'],
            'fog1_end_time' => $data['fog1_end_time'],
            'fog2_duration' => $data['fog2_duration'],
            'fog2_on_minutes' => $data['fog2_on_minutes'],
            'fog2_off_minutes' => $data['fog2_off_minutes'],
            'fog2_start_time' => $data['fog2_start_time'],
            'fog2_end_time' => $data['fog2_end_time'],
            'light1_red' => $data['light1_red'],
            'light1_blue' => $data['light1_blue'],
            'light1_green' => $data['light1_green'],
            'light1_white' => $data['light1_white'],
            'light1_bright' => $data['light1_bright'],
            'light1_start_time' => $data['light1_start_time'],
            'light1_end_time' => $data['light1_end_time'],
            'light2_red' => $data['light2_red'],
            'light2_blue' => $data['light2_blue'],
            'light2_green' => $data['light2_green'],
            'light2_white' => $data['light2_white'],
            'light2_bright' => $data['light2_bright'],
            'light2_start_time' => $data['light2_start_time'],
            'light2_end_time' => $data['light2_end_time'],
            'humidity' => $data['humidity'],
            'device_rtc' => $data['device_rtc'],
            'default' => $data['default'],
            'status' => 0,
        ]);

        return (new RecipeResource($recipe))->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($mac)
    {
        //

        $recipeCount = Recipe::where(['device_mac' => $mac, 'user_id' => auth('api')->user()->id])->count();

        if($recipeCount == 0)
        {
            return response()->json([
                'data' => [
                    'id' => null,
                    'type' => 'Recipe',
                    'attributes' => [
                        'device_mac' => null,
                        'user_id' => null,
                        'recipe_name' => null,
                        'fog1_duration' => null,
                        'fog1_on_minutes' => null,
                        'fog1_off_minutes' => null,
                        'fog1_start_time' => null,
                        'fog1_end_time' => null,
                        'fog2_duration' => null,
                        'fog2_on_minutes' => null,
                        'fog2_off_minutes' => null,
                        'fog2_start_time' => null,
                        'fog2_end_time' => null,
                        'light1_red' => null,
                        'light1_blue' => null,
                        'light1_green' => null,
                        'light1_white' => null,
                        'light1_bright' => null,
                        'light1_start_time' => null,
                        'light1_end_time' => null,
                        'light2_red' => null,
                        'light2_blue' => null,
                        'light2_green' => null,
                        'light2_white' => null,
                        'light2_bright' => null,
                        'light2_start_time' => null,
                        'light2_end_time' => null,
                        'humidity' => null,
                        'device_rtc' => null,
                        'default' => null,
                        'status' => null,
                        'success' => 'No',
                    ]
                ]
            ], 200);
        }
        else
        {
            return (RecipeResource::collection(Recipe::where(['device_mac' => $mac, 'user_id' => auth('api')->user()->id])->get()))->response()->setStatusCode(200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id, $mac)
    {
        //

        if(!empty(Recipe::find($id)))
        {
            Recipe::where(['device_mac' => $mac, 'user_id' => auth('api')->user()->id])->update(['status' => 0]);

            Recipe::where(['device_mac' => $mac, 'user_id' => auth('api')->user()->id, 'id' => $id])->update(['status' => 1]);

            $recipe = Recipe::where(['device_mac' => $mac, 'user_id' => auth('api')->user()->id, 'id' => $id])->first();

            return (new RecipeResource($recipe))->response()->setStatusCode(200);
        }
        else
        {
            return response()->json([
                'data' => [
                    'id' => null,
                    'type' => 'Recipe',
                    'attributes' => [
                        'device_mac' => null,
                        'user_id' => null,
                        'recipe_name' => null,
                        'fog1_duration' => null,
                        'fog1_on_minutes' => null,
                        'fog1_off_minutes' => null,
                        'fog1_start_time' => null,
                        'fog1_end_time' => null,
                        'fog2_duration' => null,
                        'fog2_on_minutes' => null,
                        'fog2_off_minutes' => null,
                        'fog2_start_time' => null,
                        'fog2_end_time' => null,
                        'light1_red' => null,
                        'light1_blue' => null,
                        'light1_green' => null,
                        'light1_white' => null,
                        'light1_bright' => null,
                        'light1_start_time' => null,
                        'light1_end_time' => null,
                        'light2_red' => null,
                        'light2_blue' => null,
                        'light2_green' => null,
                        'light2_white' => null,
                        'light2_bright' => null,
                        'light2_start_time' => null,
                        'light2_end_time' => null,
                        'humidity' => null,
                        'device_rtc' => null,
                        'default' => null,
                        'status' => null,
                        'success' => 'No',
                    ]
                ]
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update($id, $mac, Request $request)
    {
        //

        $data = $request->all();

        Recipe::where(['device_mac' => $mac, 'user_id' => auth('api')->user()->id, 'id' => $id])->update(['device_mac' => $data["device_mac"], 'user_id' => $data["user_id"], 'recipe_name' => $data["recipe_name"], 'fog1_duration' => $data["fog1_duration"], 'fog1_on_minutes' => $data["fog1_on_minutes"], 'fog1_off_minutes' => $data["fog1_off_minutes"], 'fog1_start_time' => $data["fog1_start_time"], 'fog1_end_time' => $data["fog1_end_time"], 'fog2_duration' => $data["fog2_duration"], 'fog2_on_minutes' => $data["fog2_on_minutes"], 'fog2_off_minutes' => $data["fog2_off_minutes"], 'fog2_start_time' => $data["fog2_start_time"], 'fog2_end_time' => $data["fog2_end_time"], 'light1_red' => $data["light1_red"], 'light1_blue' => $data["light1_blue"], 'light1_green' => $data["light1_green"], 'light1_white' => $data["light1_white"], 'light1_bright' => $data["light1_bright"], 'light1_start_time' => $data["light1_start_time"], 'light1_end_time' => $data["light1_end_time"], 'light2_red' => $data["light2_red"], 'light2_blue' => $data["light2_blue"], 'light2_green' => $data["light2_green"], 'light2_white' => $data["light2_white"], 'light2_bright' => $data["light2_bright"], 'light2_start_time' => $data["light2_start_time"], 'light2_end_time' => $data["light2_end_time"], 'humidity' => $data["humidity"], 'device_rtc' => $data["device_rtc"], 'default' => $data["default"]]);

        $recipe = Recipe::where(['device_mac' => $mac, 'user_id' => auth('api')->user()->id, 'id' => $id])->first();

        return (new RecipeResource($recipe))->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //

        if(Recipe::where('default', '!=', 1)->where(['id' => $id])->delete())
        {
            return response()->json([
                'data' => [
                    'type' => 'Recipe',
                    'attributes' => [
                        'success' => 'Yes',
                    ]
                ]
            ], 200);
        }
        else
        {
            $count = Recipe::where('default', '!=', 0)->where(['id' => $id])->count();

            if($count == 1)
            {
                return response()->json([
                    'data' => [
                        'type' => 'Recipe',
                        'attributes' => [
                            'success' => 'No',
                            'message' => 'Default, can not delete',
                        ]
                    ]
                ], 200);
            }
            else
            {
                return response()->json([
                    'data' => [
                        'type' => 'Recipe',
                        'attributes' => [
                            'success' => 'No',
                            'message' => 'Missing Recipe',
                        ]
                    ]
                ], 200);
            }
        }
    }

    public function viewRecipes()
    {
        Session::put('page', 'view-recipes');

        $recipes = Recipe::with('device', 'user')->get();

        return view('admin.recipes.view_recipes')->with(compact('recipes'));
    }
}
