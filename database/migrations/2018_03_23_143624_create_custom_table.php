<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom', function (Blueprint $table) {
            $table->string('user');
            $table->string('anime');
            $table->string('tag')->nullable();
            $table->string('note')->nullable();
            $table->string('state');
			$table->primary(['user','anime']);
			$table->foreign('user')->references('name')->on('users');
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
        Schema::dropIfExists('custom');
    }
}
