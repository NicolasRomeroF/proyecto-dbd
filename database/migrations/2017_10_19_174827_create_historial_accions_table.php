<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialAccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_accions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->timestamp('fecha');
            $table->string('id_tabla');
            $table->string('nombre_tabla');
            $table->string('previous_state');
            $table->string('actual_state');
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
        Schema::dropIfExists('historial_accions');
    }
}
