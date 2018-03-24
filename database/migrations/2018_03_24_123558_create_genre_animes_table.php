<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_animes', function (Blueprint $table) {
            $table->string('anime');
            $table->string('genre');
			$table->primary(['anime','genre']);
			$table->foreign('anime')->references('anime')->on('animes');
			$table->foreign('genre')->references('genre')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_animes');
    }
}
