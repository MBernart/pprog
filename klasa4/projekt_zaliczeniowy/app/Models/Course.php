<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function Owner()
    {
        return $this->belongsTo(User::class);
    }

    public function Memberships()
    {
        return $this->hasMany(CourseMembership::class, 'course_id', 'id');
    }

    public function UsersMembership(User $user)
    {
        return $this->Memberships->where('user_id', $user->id);
    }

    public function Tests()
    {
        return $this->hasMany(Test::class, 'course_id', 'id');
    }

    public function CanEdit($user)
    {
        if ($this->Owner == $user)
            return true;
        return false;
    }

    public function CanAddMember($user)
    {
        if ($this->Owner == $user)
            return true;
        return false;
    }

    public function AddMember(User $user)
    {
        $membership = new CourseMembership(['course_id' => $this->id, 'user_id' => $user->id, 'access_level' => 1]);
        $membership->save();
    }
}
