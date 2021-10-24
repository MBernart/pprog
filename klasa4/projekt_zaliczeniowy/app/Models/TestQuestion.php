<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    use HasFactory;

    public function Answers()
    {
        return $this->hasMany(QuestionAnswer::class, 'question_id', 'id');
    }

    public function Test()
    {
        return $this->belongsTo(Test::class);
    }

    public function CorrectAnswers()
    {
        return $this->belongsToMany(QuestionAnswer::class, 'correct_answers', 'question_id',
            'correct_answers.correct_answer', 'id');
    }
}
