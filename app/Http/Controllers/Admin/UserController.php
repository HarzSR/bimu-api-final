<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    //

    public function viewUsers()
    {
        Session::put('page', 'view-users');

        // $users = User::where(['status' => 1])->get();
        $users = User::get();

        return view('admin.users.view_users')->with(compact('users'));
    }
}
