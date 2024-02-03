<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;


class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    function processRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->jab_id = $request->jab_id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            return redirect()->route('login')->with("success", "Register Success");
        } else {
            return redirect()->back()->withInput()->withErrors("Something Error !");
        }
    }
}
