<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Genero extends Migration
{
    public function up()
    {
        Schema::create('genero', function (Blueprint $table) {
            $table->increments('idgen');
            $table->string('genero',30);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('genero');
    }
}
