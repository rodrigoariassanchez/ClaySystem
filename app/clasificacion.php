<?php

namespace App;



use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class clasificacion extends Eloquent
{
    protected $primarykey = 'idclas';
    protected $fillable = ['idli','tipoclasi'];
}
