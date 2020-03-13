<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
class clasificaciones extends Eloquent
{
    protected $primaryKey = 'idclas';
    protected $fillable = ['idclas','tipoclasi','activo'];
}

