<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Hash;

class AdminRegistrationController extends Controller
{
    protected  $guard = 'admin';
    public function login(Request $req)
    {
        $user = Admin::where("email",$req->email)->first();
        if (Hash::check($req->password,$user->password)) {
            return $user->createToken('Todo App')->accessToken;
        } else {
            return ['status' => 404, 'message' => "failed"];
        }
        // if(\Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password]))
        // {
        //     $user = \Auth::user(); 
        //     $user['token'] =  $user->createToken($user->id)-> accessToken; 
        //     return ['status' => 200, 'message' => "success", 'data' => $user];
        // } else {
        //     return ['status' => 404, 'message' => "failed"];
        // }
    }

    public function register(Request $req)
    {
        Admin::create(['name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password)
            ]);
        return ['status' => 200, 'message' => "success"];
    }
}
