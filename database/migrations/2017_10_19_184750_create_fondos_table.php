<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fondos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_catastrofe')->nullable();
            $table->string('nombre');
            $table->string('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->boolean('activo');
            $table->integer('montoActual');
            $table->integer('monto');
            $table->string('banco');
            $table->string('cuenta');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('fondos');
    }
}
