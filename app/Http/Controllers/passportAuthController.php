<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class passportAuthController extends Controller
{
    //

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function registerUserExample(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'data' => [
                'type' => 'Register',
                'attributes' => [
                    'success' => 'Yes',
                    'email' => $request->email,
                    'password' => $request->password
                ]
            ]
        ], 200);
    }
}
