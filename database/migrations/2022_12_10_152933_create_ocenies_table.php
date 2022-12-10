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
            $table->unsignedInteger('id_Uczen');
            $table->foreign('id_Uczen')->references('id')->on('uczen');
            $table->unsignedInteger('id_Zajecia');
            $table->foreign('id_Zajecia')->references('id')->on('zajecia');
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
