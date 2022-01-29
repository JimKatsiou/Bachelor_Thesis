<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('connection_id');
            // $table->foreign('connection_id')->references('id')->on('connections');
            $table->integer('type'); //1 = accept_professor , 2 = accept_admin ,
            // 3 = reject_professor , 4 = reject_admin , 5 = submited , 6 = saved
            $table->string('comment');
            $table->integer('writter_role');
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
        Schema::dropIfExists('status');
    }
}