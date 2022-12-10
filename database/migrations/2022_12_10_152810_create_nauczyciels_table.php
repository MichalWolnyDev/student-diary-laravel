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
        Schema::create('Nauczyciel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Imie');
            $table->string('Nazwisko');
            $table->unsignedInteger('id_Przedmiot');
            $table->foreign('id_Przedmiot')->references('id')->on('przedmiot');
            $table->string('Login');
            $table->string('Haslo');
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
        Schema::dropIfExists('Nauczyciel');
    }
};
