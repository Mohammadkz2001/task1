<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)

    {
        $login = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);
        if (!Auth::attempt($login)){
            response([
                'massage'=>'invalid login info'
            ]);
        }
        $AccessToken = Auth::user()->createtoken('AuthToken')->accesstoken;
        return response([
           'user'=>Auth::user(),
           'AccessToken'=> $AccessToken
        ]);
    }
}
