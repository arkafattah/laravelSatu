<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        $credential = ['email' => $request->email, 'password' => $request->password];
        $login = Auth::attempt($credential);
        if ($login) {
            // dd(Auth::check());
            return redirect()->route('home');
        } else {
            return redirect()->back()->withInput()->withErrors("Ets anda mau ngapain ?");
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
