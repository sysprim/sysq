<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnsTable extends Migration
{
    public function up()
    {
        Schema::create('turns', function (Blueprint $table) {
            $table->increments('id');
            $table->string ('random_code');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->string ('turn_type');
            $table->string ('turn_status')->default('En Espera');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('turns');
    }
}
