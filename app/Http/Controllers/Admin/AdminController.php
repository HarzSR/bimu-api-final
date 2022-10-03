<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Device;
use App\Models\Locations;
use App\Models\Logs;
use App\Models\Recipe;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class AdminController extends Controller
{
    // Get Dashboard

    public function dashboard()
    {
        Session::put('page', 'dashboard');

        $userCount = User::count();
        $userActiveCount = User::where(['status' => 1])->count();
        $userInactiveCount = User::where(['status' => 0])->count();
        $tagsCount = Tags::count();
        $tagsActiveCount = Tags::where(['status' => 1])->count();
        $tagsInactiveCount = Tags::where(['status' => 0])->count();
        $locationCount = Locations::count();
        $locationActiveCount = Locations::where(['status' => 1])->count();
        $locationInactiveCount = Locations::where(['status' => 0])->count();
        $logCount = Logs::count();
        $logActiveCount = Logs::where(['status' => 1])->count();
        $logInactiveCount = Logs::where(['status' => 0])->count();

        return view('admin.admin_dashboard')->with(compact('userCount', 'userActiveCount', 'userInactiveCount', 'tagsCount', 'tagsActiveCount', 'tagsInactiveCount', 'locationCount', 'locationActiveCount', 'locationInactiveCount', 'logCount', 'logActiveCount', 'logInactiveCount'));
    }

    // Login Function

    public function login(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $data = $request->all();

            // V0.1 Validator

            $validator = Validator::make($request->all(), [
                    'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:255',
                    // 'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                    'password' => 'required|min:6',
                ]
            // [
            //     'password.regex' => 'Incorrect Password Strength',
            // ]
            );

            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput($request->input());
            }

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']]))
            {
                return redirect('/admin/dashboard');
            }
            else
            {
                Session::flash('error_message', 'Invalid Credentials');
                return redirect()->back()->withInput($request->input());
            }

            // dd($data);
        }

        return view('admin.admin_login');
    }

    // Logout Function

    public function logout()
    {
        Session::flush();

        Auth::guard('admin')->logout();

        Session::flash('success_message', 'Logged Out Successfully');

        return redirect('/admin');
    }

    public function viewAdmins()
    {
        Session::put('page', 'view-admins');

        $admins = Admin::get();

        return view('admin.admins.view_admins')->with(compact('admins'));
    }
}
