<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Libros extends Migration
{
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('idli');
            $table->string('nomli',40);
            $table->string('editorial',20);
            $table->string('autor',40);
            $table->integer('idgen')->unsigned();
            $table->foreign('idgen')->references('idgen')->on('genero');
            $table->string('paginas',20);
            $table->string('anoedi',40);
            $table->integer('precio',10);
            $table->integer('idclasi')->unsigned();
            $table->foreign('idclasi')->references('idclasi')->on('clasificacion');
            $table->string('estado',30);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('libros');
    }
}
