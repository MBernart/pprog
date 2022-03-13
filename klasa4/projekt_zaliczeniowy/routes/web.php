<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Course;
use App\Models\LoginCredentials;
use App\Models\Test;
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
    return view('user.login');
})->name('login');

Route::get('register', function ()
{
    return view('user.register');
})->name('register');

Route::get("profile", function ()
{
    return view('user.profile');
});

Route::get("profile/{username}", function ($username)
{
    return response('Not implemented yet', 501);
})->middleware('auth');

Route::get('logout', [AuthController::class, 'logout']);

Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);

Route::post('updateEmail', [UserController::class, 'updateEmail'])
    ->name('updateEmail');

Route::post('changePassword', [UserController::class, 'changePassword'])
    ->name('changePassword')
    ->middleware('auth');
#endregion

#region Courses
Route::get('courses', function ()
{
    return view('course.list');
})->middleware('auth');

Route::get('course/{course_id}', function ($course_id)
{
    return view('course.course', ['course' => Course::find($course_id)]);
})->middleware('auth')
    ->name('course');

#region Tests
Route::get('course/test/approach/dialog/{test_id}', function ($test_id)
{
    return view('test.start-dialog', ['test' => Test::find($test_id)]);
})->middleware('auth')
    ->name('test-start-dialog');

Route::get('course/test/approach/{test_id}', [TestController::class, 'startApproach'])
    ->middleware('auth')
    ->name('start-test');

Route::get('course/test/approach/{test_id}/question', [TestController::class, 'handleTestApproach'])
    ->middleware('auth')
    ->name('test-question');

Route::post('course/test/approach/{test_id}/question/submit', [TestController::class, 'handleTestApproach'])
    ->middleware('auth')
    ->name('submit-answer');

Route::get('course/test/approach/results/{approach_id}', [TestController::class, 'displayResults'])
    ->middleware('auth')
    ->name('get-test-result');

Route::get('course/test/{test_id}/grades', function ($test_id)
{
    return view('test.grades', ['test' => Test::find($test_id)]);
})
    ->name('get-test-grades');

#endregion Tests

#endregion Courses