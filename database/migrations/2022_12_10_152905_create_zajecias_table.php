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
        Schema::create('Zajecia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nazwa');
            $table->unsignedInteger('id_Nauczyciel');
            $table->foreign('id_Nauczyciel')->references('id')->on('nauczyciel');
            $table->unsignedInteger('id_Klasa');
            $table->foreign('id_Klasa')->references('id')->on('klasa');
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
        Schema::dropIfExists('Zajecia');
    }
};
