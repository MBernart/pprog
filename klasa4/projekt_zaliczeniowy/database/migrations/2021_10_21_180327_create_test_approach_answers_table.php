<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestApproachAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_approach_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_approach_id')
                ->references('id')
                ->on('test_approaches');
            $table->foreignId('question_id')
                ->references('id')
                ->on('test_questions');
            $table->foreignId('given_answer_id')
                ->references('id')
                ->on('question_answers');
            $table->double('score_awarded');
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
        Schema::dropIfExists('test_approach_answers');
    }
}
