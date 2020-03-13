<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
class genero extends Eloquent
{
    protected $primarykey = 'idgen';
    protected $fillable = ['idgen','genero'];
}
