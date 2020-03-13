<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detalle extends Migration
{
    public function up()
    {
        Schema::create('detalle', function (Blueprint $table) {
            $table->increments('idd');
            $table->integer('idren')->unsigned();
            $table->foreign('idren')->references('idren')->on('renta');
            $table->integer('idli')->unsigned();
            $table->foreign('idli')->references('idli')->on('libros');
            $table->integer('renta',40);
            $table->integer('idus')->unsigned();
            $table->foreign('idus')->references('idus')->on('usuarios');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('detalle');
    }
}
