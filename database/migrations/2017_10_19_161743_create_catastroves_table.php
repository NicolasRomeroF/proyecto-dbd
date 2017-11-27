<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatastrovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catastroves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_user');
            $table->integer('id_comuna')->nullable();
            $table->string('tipo');
            $table->text('descripcion')->nullable();
            $table->date('fecha');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_comuna')->references('id')->on('comunas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catastroves');
    }
}
