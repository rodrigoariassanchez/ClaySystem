<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
class detalle extends Eloquent
{
    protected $primaryKey = 'idd';
    protected $fillable = ['idd','idren','idli','renta','idus','activo'];
}
