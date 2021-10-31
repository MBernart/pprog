<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginCredentials;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $loginCredentials = LoginCredentials::query()
            ->where('login', '=', $request->input('login'))
            ->first();

//        dd($request->input('password'), $loginCredentials->password,
//            Hash::check($request->input('password'), $loginCredentials->password));
        if (Hash::check($request->input('password'), $loginCredentials->password)) {
            $user = User::query()
                ->where('related_login_id', '=', $loginCredentials->id)
                ->first();

            Auth::loginUsingId($user->id);
            return redirect('home');
        }
        return redirect('login')->with('message', 'Login Failed');
    }
}
