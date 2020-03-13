<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
class sucursal extends Eloquent
{
    protected $primarykey = 'idsu';
    protected $fillable = ['idsu','nombre','telefono','responsable'];
}
