<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function verificacaoLogin(Request $request)
    {
        $request->validate([
            'user' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = [
            'user' => $request->user,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            Session::start();
            Session::put(['nome' => $request->user]);
            Session::save();
            return redirect()->intended(route('inicio'));
        }
        return redirect()->back()->withInput($request->only('user'));
    }

    public function index()
    {
        return view('login');
    }
}
