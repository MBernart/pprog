<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'username' => [
                'required',
                Rule::exists('users')
            ],
            'password' => 'required'
        ])->validate();
        $credentials = request(['username', 'password']);
        // return request('username');
        if (Auth::attempt($credentials))
        {
            return redirect()->intended('/');
        }
        return redirect()->route('login')->withErrors(['password' => 'This password is not valid!']);
    }

    public function logout()
    {
        Auth::logout();

        Session::flush();

        return redirect('login');
    }

    public function register()
    {
        Validator::make(request(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();
        if (User::where('username', request('username'))->exists())
        {
            return redirect()->back()->with('error', "Nazwa użytkownika request('username') jest już zajęta!");
        }
        $credentials = request(['username', 'password']);
        $this->login();
        return redirect()->intended('/');
    }
}
