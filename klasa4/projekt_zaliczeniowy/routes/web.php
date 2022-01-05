<?php

use App\Http\Controllers\AuthController;
use App\Models\LoginCredentials;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
})->middleware('auth');

#region User
Route::get('login', function ()
{
    return view('login');
})->name('login');

Route::get('register', function ()
{
    return view('register');
})->name('register');

Route::get("profile", function ()
{
    return view('profile');
})->middleware('auth');

Route::get('logout', [AuthController::class, 'logout']);

Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);
#endregion
