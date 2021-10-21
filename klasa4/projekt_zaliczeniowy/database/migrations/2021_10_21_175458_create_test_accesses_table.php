<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_accesses', function (Blueprint $table) {
            $table->foreignId('test_id')
                ->references('id')
                ->on('tests');
            $table->foreignId('membership_id')
                ->references('id')
                ->on('course_memberships');
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
        Schema::dropIfExists('test_accesses');
    }
}
