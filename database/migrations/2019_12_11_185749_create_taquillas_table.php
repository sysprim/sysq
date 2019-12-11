<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaquillasTable extends Migration
{

    public function up()
    {
        Schema::create('taquillas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_taquilla');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('taquillas');
    }
}
