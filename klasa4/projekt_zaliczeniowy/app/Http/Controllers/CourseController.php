<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function editCourse($course_id)
    {
        // dd('3');
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
}
