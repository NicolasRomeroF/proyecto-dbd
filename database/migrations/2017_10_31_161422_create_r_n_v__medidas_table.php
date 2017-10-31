<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRNVMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_n_v__medidas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_voluntario');
            $table->integer('id_medida');
            $table->timestamps();
            $table->foreign('id_voluntario')->references('id')->on('voluntariados');
            $table->foreign('id_medida')->references('id')->on('medidas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_n_v__medidas');
    }
}
