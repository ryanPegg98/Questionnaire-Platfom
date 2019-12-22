<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scales', function (Blueprint $table){
            $table->increments('id');
            $table->integer('question')->unsigned();
            $table->foreign('question')->references('id')->on('questions')->onDelete('cascade');
            $table->string('startDetail');
            $table->integer('start');
            $table->string('endDetail');
            $table->integer('end');
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
        Schema::drop('scales');
    }
}
