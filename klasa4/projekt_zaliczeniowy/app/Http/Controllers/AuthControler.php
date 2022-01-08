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
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\InputBag;

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
        Validator::make(request()->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();
        if (User::where('username', request('username'))->exists())
        {
            $myErrors['username'] = "Ta nazwa użytkownika jest już zajęta!";
        }
        if (User::where('email', request('email'))->exists())
        {
            $myErrors['email'] = "Ten adres mailowy jest już zajęty";
        }
        if (isset($myErrors))
        {
            return redirect()->back()->exceptInput('password')->withErrors($myErrors);
        }
        $credentials = request(['username', 'password']);
        $user = new User(request(['username', 'email', 'password']));
        $user->save();
        $this->login();
        return redirect()->intended('/');
    }
}
