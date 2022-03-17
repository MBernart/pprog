<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'access_level'
    ];

    /***
     * TODO:
     * Permission System: 
     * is binary-based system xn corresponds to nth power of 2
     * x0 => can manage permissions
     * x1 => can edit course
     * x2 => can edit tests (if can create new test)
     * x3 => can remove test
     * x4 => can add members
     * x5 => can kick members
     * 
     * It implies hardcoding n+1 methods ;/
     * 
     * NOTE: only owner can remove course
     */

    public function AccessLevel()
    {
        return $this->hasOne(CourseMembershipAccessLevel::class, 'level', 'access_level');
    }

    public function Course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function TestApproaches()
    {
        return $this->hasMany(TestApproach::class, 'membership_id', 'id');
    }

    public function EmptyApproaches()
    {
        return $this->TestApproaches()->where('start_time', NULL);
    }

    public function HasEmptyApproaches() :bool
    {
        return $this->EmptyApproaches->isNotEmpty();
    }

    public function CanEditTest()
    {
        return false;
    }
}
