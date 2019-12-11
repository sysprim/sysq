<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnosTable extends Migration
{
 
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('taquilla_id')->unsigned();
            $table->foreign('taquilla_id')->references('id')->on('taquillas');
            $table->string('tipo_turno');
            $table->string('status_turno')->default('En Espera');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('turnos');
    }
}
