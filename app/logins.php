<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
class logins extends Eloquent
{
  	protected $primaryKey = 'idlo'; 
  	protected $fillable=['idlo','nombre','apellido','correo','tipo','password','archivo','activo'];
}
