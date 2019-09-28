<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question1');
            $table->string('question1_answer');
            $table->string('question2');
            $table->string('question2_answer');
            $table->string('question3');
            $table->string('question3_answer');
            $table->integer('exam_id')->unsigned();

            $table->timestamps();

//            $table->foreign('exam_id')->references('id')->on('exams')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
