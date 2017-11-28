<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('monto');
            $table->string('cuenta');
            $table->string('banco');
            $table->integer('id_user');
            $table->integer('id_fondos');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_fondos')->references('id')->on('fondos');
        });

        DB::unprepared('
            CREATE OR REPLACE FUNCTION sumaDonaciones(id_fondo integer) RETURNS integer AS $$
                DECLARE suma INTEGER;

            BEGIN
                SELECT SUM(monto) INTO suma
                FROM donacions D
                WHERE D.id = id_fondo;

                RETURN suma;
            END

            $$ LANGUAGE plpgsql;
        ');

        DB::unprepared('
            CREATE OR REPLACE FUNCTION actualizarFondo() RETURNS trigger AS $$
                DECLARE id_fondo INTEGER;
                DECLARE resultado INTEGER;

            BEGIN
                SELECT D.id INTO id_fondo
                FROM donacions D
                ORDER BY D.id DESC
                LIMIT 1;
                
                SELECT sumaDonaciones(id_fondo) INTO resultado;
                UPDATE fondos F
                SET monto = resultado
                WHERE F.id = id_fondo;
                RETURN NULL;
            END

            $$ LANGUAGE plpgsql;
        ');

        DB::unprepared('
            DROP TRIGGER IF EXISTS triggerdonacion ON donacions;

            CREATE TRIGGER triggerdonacion
                AFTER INSERT 
                ON donacions
                FOR EACH ROW
                EXECUTE PROCEDURE actualizarfondo();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donacions');
    }
}
