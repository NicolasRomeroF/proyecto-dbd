<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRNVsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_n_v_s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('numero_telefono')->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->boolean('disponible');
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
        Schema::dropIfExists('r_n_v_s');
    }
}
