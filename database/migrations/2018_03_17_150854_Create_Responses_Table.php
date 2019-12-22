<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function(Blueprint $table){
            $table->integer('respondant')->unsigned();
            $table->foreign('respondant')->references('id')->on('respondants')->onDelete('cascade');
            $table->integer('question')->unsigned();
            $table->foreign('question')->references('id')->on('questions')->onDelete('cascade');
            $table->text('response');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('responses');
    }
}
