<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updateEmail()
    {
        Validator::make(request(['email']), [
            'email' => 'email|required'
        ])->validate();
        $u = Auth::user();
        $u->email = request('email');
        $u->save();
        return redirect()->back()->with('emailChanged', "Adres email został zmieniony poprawnie");
    }

    public function changePassword()
    {
        Validator::make(request(['old-password', 'new-password']), [
            'old-password' => 'required',
            'new-password' => 'required'
        ])->validate();
        $oldPassword = request('old-password');
        $newPassword = request('new-password');
        $u = Auth::user();
        if (!Hash::check($oldPassword, $u->password))
        {
            return redirect()->back()->withErrors(['old-password' => "Hasło nieprawidłowe"]);
        }
        $u->password = $newPassword;
        $u->save();
        return redirect()->back()->with('passwordChanged', "Hasło zostało zmienione poprawnie");
    }
}
