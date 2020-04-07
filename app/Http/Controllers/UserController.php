<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function users()
    {
        $users = User::get();
        return $users;
    }

    public function create(Request $req)
    {
        User::create(['name' => $req->name,
                    'email' => $req->email,
                    'password' => bcrypt($req->password)
                    ]);
        return ['status' => 200, 'message' => "success"];
    }
}
