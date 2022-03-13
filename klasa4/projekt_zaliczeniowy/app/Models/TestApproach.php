<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestApproach extends Model
{
    use HasFactory;
    protected $fillable = [
        'membership_id',
        'test_id',
    ];

    public function Test()
    {
        return $this->hasOne(Test::class, 'id', "test_id");
    }

    public function getApproachAnswers()
    {
        return $this->hasMany(TestApproachAnswer::class, 'test_approach_id', 'id');
    }

    public function getScore()
    {
        $totalScore = $this->Test->Questions->sum('max_points');
        $currentScore = $this->getApproachAnswers()->sum('score_awarded');
        return [$currentScore, $totalScore];
    }

    public function Membership()
    {
        return $this->hasOne(CourseMembership::class, 'id', 'membership_id');
    }

    public function User()
    {
        return $this->Membership()->first()->User();
    }

    protected $primaryKey = 'id';
}
