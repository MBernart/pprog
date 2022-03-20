<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestApproachAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_approach_id',
        'question_id',
        'given_answer_id',
        'score_awarded'
    ];

    // QuestionAnswer

    public function Question()
    {
        return $this->hasOne(TestQuestion::class, 'id', 'question_id');
    }


    public function GivenAnswer()
    {
        return $this->hasOne(QuestionAnswer::class, 'id', 'given_answer_id');
    }
}
