<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMembership extends Model
{
    use HasFactory;

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
        return $this->hasMany(TestApproach::class, 'id', 'membership_id');
    }
}
