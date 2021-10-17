<?php

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
            $table->foreignIdFor(\App\Models\Course::class, "course_id");
            $table->foreignIdFor(\App\Models\User::class, "user_id");
            $table->foreignIdFor(\App\Models\CourseMembershipAccessLevel::class, "access_level");
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
