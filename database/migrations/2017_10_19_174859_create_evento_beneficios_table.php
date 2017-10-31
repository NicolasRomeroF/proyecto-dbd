<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoBeneficiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_beneficios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->integer('id_ciudad');
            $table->integer('id_medida');
            $table->timestamps();
            $table->foreign('id_ciudad')->references('id')->on('ciudads');
            $table->foreign('id_medida')->references('id')->on('medidas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_beneficios');
    }
}
