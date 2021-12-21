<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function Owner()
    {
        return $this->belongsTo(User::class);
    }

    public function Memberships()
    {
        return $this->hasMany(CourseMembership::class, 'course_id', 'id');
    }

    public function Tests()
    {
        return $this->hasMany(Test::class, 'course_id', 'id');
    }
}
