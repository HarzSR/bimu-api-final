<?php

namespace App\Http\Controllers;

use App\Models\Command;
use Illuminate\Http\Request;

class CommandController extends Controller
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
    public function create($data, $commands)
    {
        //

        foreach ($commands as $command)
        {
            Command::create([
                'device_mac' => $data['mac_address'],
                'user_id' => $data['user_id'],
                'command' => $command['command'],
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function show(Command $command)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function edit(Command $command)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function update($mac, $command)
    {
        //

        $rows = Command::where(['device_mac' => $mac, 'user_id' => auth('api')->user()->id, 'command' => $command])->update(['status' => 1]);

        if($rows == 0)
        {
            return response()->json([
                'data' => [
                    'type' => 'Command',
                    'attributes' => [
                        'device_mac' => $mac,
                        'user_id' => auth('api')->user()->id,
                        'command' => $command,
                        'status' => "No Mac/User/Command Found",
                    ]
                ]
            ], 200);
        }
        if($rows == 1 )
        {
            return response()->json([
                'data' => [
                    'type' => 'Command',
                    'attributes' => [
                        'device_mac' => $mac,
                        'user_id' => auth('api')->user()->id,
                        'command' => $command,
                        'status' => 1,
                    ]
                ]
            ], 200);
        }
        if($rows > 1)
        {
            return response()->json([
                'data' => [
                    'type' => 'Command',
                    'attributes' => [
                        'device_mac' => $mac,
                        'user_id' => auth('api')->user()->id,
                        'command' => $command,
                        'status' => "Multiple Entries, Please Check DB",
                    ]
                ]
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function destroy(Command $command)
    {
        //
    }
}
