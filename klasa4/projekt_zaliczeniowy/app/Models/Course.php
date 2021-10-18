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

    public function Members()
    {
        return $this->belongsToMany(User::class, 'course_memberships', 'course_id', 'user_id');
    }
}
