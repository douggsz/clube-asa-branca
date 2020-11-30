<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Routing\Route;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/controle/socios';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
