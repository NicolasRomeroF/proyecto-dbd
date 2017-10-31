<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoluntariadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntariados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ciudad');
            $table->integer('id_medida');
            $table->integer('cantidad_voluntarios');
            $table->string('labor');
            $table->timestamps();
            $table->foreign('id_ciudad')->references('id')->on('ciudads')
            $table->foreign('id_medida')->references('id')->on('medidas')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voluntariados');
    }
}
