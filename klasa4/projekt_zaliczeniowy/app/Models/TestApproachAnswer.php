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
}
