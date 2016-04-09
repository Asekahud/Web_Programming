<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('message_id');
            $table->integer('from_id')->unsigned();
            $table->foreign('from_id')->references('id')->on('users');
            $table->integer('to_id')->unsigned();
            $table->foreign('to_id')->references('id')->on('users');
            $table->text('content');            
        });      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages');
    }
}
