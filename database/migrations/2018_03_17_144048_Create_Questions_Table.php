<?php

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
            $table->increments('id');
            $table->string('question');
            $table->integer('type');
            $table->integer('layout');
            $table->integer('creator')->unsigned();
            $table->foreign('creator')->references('id')->on('users')->onDelete('cascade');
            $table->integer('questionnaire')->unsigned();
            $table->foreign('questionnaire')->references('id')->on('questionnaires')->onDelete('cascade');
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
        Schema::drop('questions');
    }
}
