<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Course;
use App\Models\LoginCredentials;
use App\Models\Test;
use App\Models\TestApproach;
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

Route::post('course/{course_id}/edit', [CourseController::class, 'editCourse'])
    ->middleware('auth')
    ->name('course-edit');

Route::get('course/{course_id}/add-members', function ($course_id)
{
    return view('course.admin.add-members', [
        'course' => Course::find($course_id),
        'users' => User::all()
    ]);
})->middleware('auth')
    ->name('course-add-members');

Route::post('course/{course_id}/add-members/submit', [CourseController::class, 'addMembers'])
    ->middleware('auth')
    ->name('course-add-members-submit');
#region Tests

Route::post('course/test/create/{course_id}', [TestController::class, 'createTest'])
    ->middleware('auth')
    ->name('create-test');

Route::get('course/test/approach/dialog/{test_id}', function ($test_id)
{
    return view('test.approach.start-dialog', ['test' => Test::find($test_id)]);
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
    return view('test.admin.grades', ['test' => Test::find($test_id)]);
})->middleware('auth')
    ->name('get-test-grades');

Route::get('course/test/{test_id}/edit', function ($test_id)
{
    return view('test.admin.edit', ['test' => Test::find($test_id)]);
})->middleware('auth')
    ->name('edit-test');

Route::post('course/test/{test_id}/edit/submit', [TestController::class, 'editTest'])
    ->middleware('auth')
    ->name('edit-test-submit');

Route::get('course/test/{test_id}/publish', function ($test_id)
{
    return view('test.admin.publish', ['test' => Test::find($test_id)]);
})->middleware('auth')
    ->name('publish-test');

Route::post('course/test/{test_id}/publish/submit', [TestController::class, 'createApproaches'])
    ->middleware('auth')
    ->name('publish-test-submit');

Route::get('tests', function ()
{
    return view('test.list');
});

Route::get('course/test/grades/{approach_id}/answers', function ($approach_id)
{
    return view('test.admin.approach-answers', ['approach' => TestApproach::find($approach_id)]);
})->middleware('auth')
    ->name('get-approach-answers');

#endregion Tests

#endregion Courses