<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at_at' => 'datetime',
    ];
    public function CoursesTheMemberIsAssignedTo()
    {
        return $this->belongsToMany(Course::class, 'course_memberships', 'user_id', 'course_id');
    }

    public function Memberships()
    {
        return $this->hasMany(CourseMembership::class, 'user_id', 'id');
    }

    public function username()
    {
        return 'username';
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function CanEditTest($test)
    {
        $membership = $test->Course->UsersMembership($this)->first();
        return $membership->CanEditTest();
    }
}
