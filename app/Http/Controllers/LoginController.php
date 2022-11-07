<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        // if(Auth::check()){
        //     return redirect('SAP.index');
        // } else {
        // }
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError','Login failed');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
