<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sucursal extends Migration
{

    public function up()
    {
        Schema::create('sucursal', function (Blueprint $table){
            $table->increments('idsu');
            $table->string('nombre',30);
            $table->string('telefono',12);
            $table->string('responsable',30);
            $table->rememberToken();
            $table->timestamps();
        });    
    }

    
    public function down()
    {
        Schema::drop('sucursal');
    }
}
