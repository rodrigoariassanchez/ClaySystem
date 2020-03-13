<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\maestros;


class MaestroController extends Controller
{
    public function altamaestro()
    {
    	$resultado = maestros::orderby('idm','desc')
    				->take(1)
    				->get();
    	$idsig = $resultado[0]->idm + 1;
    	//echo $idsig;
    	return view ('sistema.altamaestro')
    	->with('idsig',$idsig);
    }
    public function guardarmaestro(Request $request)
    {
    	$nombre = $request->nombre;
		$edad = $request->edad;
		$apellido = $request->apellido;
		$idm = $request->idm;
		$idc = $request->idc;
	
		$this->validate($request,[
		   'nombre'=>['regex:/[A-Z][a-z,A-Z, ]*$/'],
		   'edad'=>['regex:/^[0-9]{2}$/'],
		   'apellido'=>['regex:/^[A-Z,a-z][a-z,A-Z, ,à,è,ì,ò,ù,ñ]*$/'],
		   ]);

		$maest = new maestros;
		$maest -> idm = $request->idm;
		$maest -> nombre = $request->nombre;
		$maest -> edad = $request->edad;
		$maest -> apellido = $request->apellido;
		$maest -> idc = $request->idc;
		$maest -> save();

		$proceso = "ALTA MAESTRO";
		$mensaje = "Registro guardado Correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje); 
    }
}
