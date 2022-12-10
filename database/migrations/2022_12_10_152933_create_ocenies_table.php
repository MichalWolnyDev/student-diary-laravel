<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Oceny', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Uczen');
            $table->integer('Nauczyciel');
            $table->integer('Klasa');
            $table->integer('Ocena');
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
        Schema::dropIfExists('Oceny');
    }
};
