<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
class generos extends Eloquent
{
    protected $primaryKey = 'idgen';
    protected $fillable = ['idgen','genero','activo'];
}
