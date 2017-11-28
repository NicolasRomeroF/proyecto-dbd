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
            $table->integer('id_user');
            $table->integer('id_catastrofe')->nullable();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('direccion');
            $table->integer('valido');

            $table->integer('id_comuna')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->integer('cantidad_voluntarios')->nullable();
            $table->string('labor')->nullable();
            $table->string('tipo');
            $table->string('situacion')->nullable();
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');

            $table->foreign('id_comuna')->references('id')->on('comunas');
            $table->foreign('id_catastrofe')->references('id')->on('catastroves')->onDelete('cascade');
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
