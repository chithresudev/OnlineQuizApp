<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->unsignedInteger('question_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('correct_answer')->nullable();
            $table->unsignedInteger('answer_score')->nullable();
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
