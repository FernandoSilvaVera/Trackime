<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->string('anime')->primary();
            $table->string('season');
            $table->string('tag');
            $table->tinyInteger('note');
            $table->smallInteger('chapters');
			$table->string('web');
            $table->string('animeYT')->nullable();
			$table->string('animeFLV')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animes');
    }
}
