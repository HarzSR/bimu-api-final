<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    //

    public function addUsers(Request $request)
    {
        Session::put('page', 'add-users');

        if($request->isMethod('POST'))
        {
            $data = $request->all();

            Admin::create(['user_name' => $data['name'], 'user_type' => 'user', 'user_location' => $data['location'], 'user_card_id' => $data['card'], 'user_phone' => $data['number'], 'email' => $data['email'], 'password' => bcrypt($data['password']), 'begin_date' => $data['begin_date'], 'end_date' => $data['end_date'], 'barcode' => $data['barcode'], 'image' => '', 'status' => '1']);

            return redirect()->back()->with('success_message', 'User Added Successful');
        }

        return view('admin.users.add_users');
    }

    public function viewUsers()
    {
        Session::put('page', 'view-users');

        // $users = User::where(['status' => 1])->get();
        $users = Admin::where('user_type', 'user')->get();

        return view('admin.users.view_users')->with(compact('users'));
    }
}
