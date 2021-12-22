<?php

use App\Http\Controllers\AuthController;
use App\Models\LoginCredentials;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
    // $request->session()->put('test', 'abc');
    return view('welcome');
});

Route::get('/login', function ()
{
    return view('login', ['users' => User::first()]);
});

Route::post('/login', [AuthController::class, 'login']);
