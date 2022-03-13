<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    public function Questions()
    {
        return $this->hasMany(TestQuestion::class, 'test_id', 'id');
    }

    public function TestApproaches()
    {
        return $this->hasMany(TestApproach::class, "test_id", 'id');
    }

    public function Course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function usersApproaches(User $user)
    {
        $membership = $user->Memberships->where('course_id', $this->Course->id)->first();
        return $this->TestApproaches()->where('membership_id', $membership->id);
    }

    public function usersEmptyApproaches(User $user)
    {
        return $this->usersApproaches($user)->whereNull('start_time');
    }
}
