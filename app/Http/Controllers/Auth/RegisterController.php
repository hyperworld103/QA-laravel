<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Rules\MatchOldPassword;

class RegisterController extends Controller
{
    public function Index() {
        return view('auth.register');
    }

    public function Register(request $request) {

        $registered = User::where('email', $request['email'])->first();
        
        if($registered != null) {
            return response()->json(['data'=>'0']);
        }
        
        $new_user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        auth()->login($new_user);
        
        return response()->json(['data' => '1']);
    }

    public function AccountSetting() {
        $user  = \Auth::user();
       
        return view('account-setting')->with([
            'user' => $user
        ]);
    }

    public function ChangeInfo(Request $request) {
        $u_id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $current_password = $request->current_password;
        $new_password = $request->new_password;
       
        $current_pwd = \Auth::User()->password;
        
        if(Hash::check($current_password, $current_pwd)) {
            $res = User::where('id', $u_id)->update(array('password' => Hash::make($new_password)));
            return response()->json(['data' => '1']);
        }
        
        return response()->json(['data' => '0']);
    }
}
