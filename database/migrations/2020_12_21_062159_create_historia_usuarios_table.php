<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriaUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_usuarios', function (Blueprint $table) {
            $table->increments('id');

            $table->string('resumen');
            $table->string('descripcion');
            $table->string('usuario');
            $table->string('proyecto');
            $table->string('prioridad');
            $table->string('tiempoestimado');
            $table->string('epica');

            $table->string('desarrollador');    //Desarrollador id


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
        Schema::dropIfExists('historia_usuarios');
    }
}
