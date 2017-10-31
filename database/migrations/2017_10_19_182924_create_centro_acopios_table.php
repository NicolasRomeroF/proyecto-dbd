<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentroAcopiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_acopios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('situacion');
            $table->integer('id_medida');
            $table->timestamps();
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
        Schema::dropIfExists('centro_acopios');
    }
}
