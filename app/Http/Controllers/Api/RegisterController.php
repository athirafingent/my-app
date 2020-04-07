<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function login(Request $req)
    {
        if(\Auth::attempt(['email' => $req->email, 'password' => $req->password])){ 
            $user = \Auth::user(); 
            $user['token'] =  $user->createToken($user->id)-> accessToken; 
            return ['status' => 200, 'message' => "success", 'data' => $user];
        } else {
            return ['status' => 404, 'message' => "failed"];
        }
    }

    public function register(Request $req)
    {
        User::create(['name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password)
            ]);
        return ['status' => 200, 'message' => "success"];
    }
}
