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
}
