<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatastrofeComunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catastrofe__comunas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_catastrofe');
            $table->integer('id_comuna');
            $table->timestamps();
            $table->foreign('id_catastrofe')->references('id')->on('catastroves');
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
        Schema::dropIfExists('catastrofe__comunas');
    }
}
