<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(){
        if(Auth::guard('admin')->check()){
            return redirect('/admin/dashboard');
        }
        return view('admin.auth.login');
    }
    public function registration(){
        $rolesData = Role::all();
        return view('admin.auth.register',compact('rolesData'));
    }
    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin_users',
            'role' => 'required',
            'password' => 'required',
            'confirm_password' =>'required|required_with:password|same:password'
        ]);

        $userData = new AdminUser(array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => Hash::make($request->get('password')),
        ));
        $result = $userData->save();
        if($result){
            return redirect('/admin/list-admin-users')->with('success','Success! User created.');
        }else{
            return redirect()->back()->with('error','Error! Something went wrong.');
        }
    }
    public function loginPost(Request $request){
        $request->validate([
            'email'     => 'required|email:rfc,dns',
            'password'  => 'required',
        ]);
        //CHECK EMAIL AND PASSWORD

        $login_details = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
        //print_r($login_details);exit();
        if(Auth::guard('admin')->attempt($login_details)){
//            $getRole = Auth::guard('admin')->user()->role; //pluck role
//            if($getRole == 1){
//                return redirect('/admin/dashboard')->with('message','Welcome Admin, You are logged in!');
//            }
//                return redirect('/admin/user-dashboard')->with('message','Welcome User, You are logged in!');
            return redirect('/admin/dashboard')->with('message','Welcome, You are logged in!');

        }else{
            return redirect('/login')->with('error','Error! Invalid credentials.');
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
