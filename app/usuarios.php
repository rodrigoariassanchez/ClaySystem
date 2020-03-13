<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class usuarios extends Eloquent
{
    protected $primaryKey = 'idus';
    protected $fillable = ['idus','nombre','apellido','correo','contrasena','telefono','calle','numero','municipio','estado','cp','archivo','activo'];
    protected $date = ['delete_at'];
}
