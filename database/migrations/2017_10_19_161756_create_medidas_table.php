<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_comuna');
            $table->integer('id_user');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('direccion');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->timestamps();
            $table->foreign('id_comuna')->references('id')->on('comunas');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medidas');
    }
}
