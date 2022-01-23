<?php

use App\Models\Course;
use App\Models\CourseMembershipAccessLevel;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_memberships', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('course_id');
//            $table->unsignedBigInteger('user_id');
//            $table->unsignedBigInteger('access_level');
            $table->foreignId('course_id')
                ->references('id')
                ->on('courses');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            $table->unique(['course_id', 'user_id']);
            $table->foreignId('access_level')
                ->references('level')
                ->on('course_membership_access_levels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_memberships');
    }
}
