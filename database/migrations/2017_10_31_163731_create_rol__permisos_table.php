<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol__permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_role');
            $table->integer('id_permiso');
            $table->timestamps();
            $table->foreign('id_role')->references('id')->on('roles');
            $table->foreign('id_permiso')->references('id')->on('permisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol__permisos');
    }
}
