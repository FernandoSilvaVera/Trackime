<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
			$table->string('anime')->primary();
            $table->string('start');
            $table->string('end');
            $table->string('season');
            $table->string('year','4');
            $table->string('day_new_chapter');
            $table->string('state');
            $table->foreign('anime')->references('anime')->on('animes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dates');
    }
}
