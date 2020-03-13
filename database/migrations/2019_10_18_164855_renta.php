<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Renta extends Migration
{
    public function up()
    {   
        Schema::create('renta', function (Blueprint $table) {
            $table->increments('idren');
            $table->integer('idus')->unsigned();
            $table->foreign('idus')->references('idus')->on('usuarios');
            $table->integer('idgen')->unsigned();
            $table->foreign('idgen')->references('idgen')->on('genero');
            $table->integer('idclasi')->unsigned();
            $table->foreign('idclasi')->references('idclasi')->on('clasificacion');
            $table->string('fecharenta',40);
            $table->string('fechadevol',40);
            $table->string('cantidad',30);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('renta');
    }
}
