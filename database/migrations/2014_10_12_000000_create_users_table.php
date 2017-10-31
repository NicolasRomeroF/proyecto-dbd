<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('rut')->unique();
            $table->date('fecha_nacimiento');
            $table->boolean('activo');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('id_organizacion');
            $table->integer('id_rol')
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_rol')->references('id')->on('rols');
            $table->foreign('id_organizacion')->references('id')->on('organizacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
