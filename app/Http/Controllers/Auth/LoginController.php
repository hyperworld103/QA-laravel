<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\User;
use Illuminate\Support\Facades\Auth;
use Redirect;

class LoginController extends Controller
{
    public function Index(){
        if(Auth::check()) {
            return back()->withInput();
        }
        else {
            Auth::logout();
            return view('auth/login');
        }
    }

    public function LogIn(request $request) {
        $userlogged = $request->only('email', 'password');

        if(Auth::attempt($userlogged)) {
            return response()->json(['data' => '1']);
        }
        else {
            return response()->json(['data' => '0']);
        }
    }

    public function LogOut() {
        Auth::logout();
        return Redirect::to('/');
    }
}
