<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
class renta extends Eloquent
{
    protected $primaryke = 'idren';
    protected $fillable = ['idus','idgen','id'];
}
