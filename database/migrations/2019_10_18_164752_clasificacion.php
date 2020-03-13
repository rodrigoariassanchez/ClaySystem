<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clasificacion extends Migration
{

    public function up()
    {
        Schema::create('clasificacion', function (Blueprint $table){
            $table->increments('idclas');
            $table->string('tipoclasi',30);
            $table->rememberToken();
            $table->timestamps();
        });

    }

    public function down()
    {
        
    }
}
