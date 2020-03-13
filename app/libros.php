<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
class libros extends Eloquent
{
    protected $primaryKey = 'idli';
    protected $fillable = ['idli','nomli','editorial','autor','idgen','paginas','anoedi','precio','idclas','estado','archivo','activo'];
}
