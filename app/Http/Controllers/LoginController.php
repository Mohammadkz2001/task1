<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        Auth::attempt($request->only(['email' , 'password']));
        if (Auth::user()->is_admin == 1){
            return redirect()->route('is_admin');
        }
        return redirect()->route('dashboard');
    }

}
