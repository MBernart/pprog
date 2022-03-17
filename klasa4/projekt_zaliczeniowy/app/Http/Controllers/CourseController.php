<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Monolog\Handler\RotatingFileHandler;

class CourseController extends Controller
{
    public function editCourse($course_id)
    {
        Validator::make(request()->all(), [
            'name' => 'required',
            'description' => 'required'
        ])->validate();
        $course = Course::find($course_id);
        if (!$course->CanEdit(Auth::user()))
        {
            abort(403, "Access denied");
        }
        $propertiesToChange = request($course->getFillable());
        foreach ($propertiesToChange as $key => $value)
        {
            $trimmedValue = trim($value);
            if ($course[$key] == $trimmedValue)
            {
                continue;
            }
            $course[$key] = $trimmedValue;
            session()->put($key . "Changed", __('Zmieniono poprawnie'));
        }
        $course->save();
        return redirect()->back();
    }

    public function addMembers($course_id)
    {
        // Validator::make(request()->all(), [
        //     'name' => 'required',
        //     'description' => 'required'
        // ])->validate();
        $course = Course::find($course_id);
        if (!$course->CanAddMember(Auth::user()))
        {
            abort(403, 'Access denied');
        }
        $user_ids = request('users');
        // dd($user_ids);
        foreach ($user_ids as $key => $id)
        {
            $user = User::find($id);
            $course->AddMember($user);
            session()->put('addMembers');
        }
        return redirect(route('course', $course_id));
    }
}
