<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ci_client')->unique();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
