<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
class sucursales extends Eloquent
{
    protected $primaryKey = 'idsu';
    protected $fillable = ['idsu','nombre','telefono','responsable','activo'];
}
