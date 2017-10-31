<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioFondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario__fondos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_fondos');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_fondos')->references('id')->on('fondos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario__fondos');
    }
}
