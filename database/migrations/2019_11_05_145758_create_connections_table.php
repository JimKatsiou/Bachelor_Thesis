<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('participation_id');
            // $table->unsignedInteger('participation_id')->index();
            // $table->foreign('participation_id')->references('id')->on('participations')->onDelete('cascade');

            $table->unsignedInteger('uop_lesson_id');
            // $table->unsignedInteger('uop_lesson_id')->index();
            // $table->foreign('uop_lesson_id')->references('id')->on('lessons')->onDelete('cascade');

            $table->unsignedInteger('remote_lesson_id');
            // $table->unsignedInteger('remote_lesson_id')->index();
            // $table->foreign('remote_lesson_id')->references('id')->on('lessons')->onDelete('cascade');

            $table->unsignedInteger('status_id');
            // $table->unsignedInteger('status_id')->index();
            // $table->unique('status_id')->references('id')->on('status');

            $table->double('degree');
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
        Schema::dropIfExists('connections');
    }
}