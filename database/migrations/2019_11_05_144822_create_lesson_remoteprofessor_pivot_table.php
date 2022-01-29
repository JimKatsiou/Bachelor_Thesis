<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonRemoteprofessorPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_remoteprofessor', function (Blueprint $table) {
            $table->integer('lesson_id')->unsigned()->index();
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->integer('remote_professor_id')->unsigned()->index();
            $table->foreign('remote_professor_id')->references('id')->on('remoteprofessors')->onDelete('cascade');
            $table->primary(['lesson_id', 'remote_professor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_remoteprofessor');
    }
}