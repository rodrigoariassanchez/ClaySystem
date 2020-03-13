<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('idus');
            $table->string('nombre',20);
            $table->string('apellido',20);
            $table->string('correo',40);
            $table->string('contrasena',40);
            $table->string('telefono',20);
            $table->string('calle',40);
            $table->string('numero',10);
            $table->string('municipio',40);
            $table->string('estado',30);
            $table->string('cp',10);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('usuarios');
    }
}
