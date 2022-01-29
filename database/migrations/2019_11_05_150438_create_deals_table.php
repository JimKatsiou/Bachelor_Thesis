<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->unsignedInteger('uop_id');
            $table->foreign('uop_id')->references('id')->on('universities');
            $table->unsignedInteger('remote_id');
            $table->foreign('remote_id')->references('id')->on('universities');
            $table->primary(['uop_id', 'remote_id']);
            $table->timestamp('date_from');
            $table->timestamp('date_to');
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
        Schema::dropIfExists('deals');
    }
}
