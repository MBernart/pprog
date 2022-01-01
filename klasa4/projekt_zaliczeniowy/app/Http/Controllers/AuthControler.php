<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    // public function __construct()
    // {
    //     // $this->middleware('auth');
    // }
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials))
        {
            return redirect()->intended('/');
        }
        return redirect()->guest('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        Session::flush();

        return redirect('login');
    }
}
