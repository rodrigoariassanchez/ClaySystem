<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tic42 extends Controller
{
    public function saludo()
	{
		echo "HOLA MUNDO TIC 42";
	}
	public function s()
	{
		$x= 10;
		$y = 20;
		$total = $x+$y;
		echo "El gran total es $total" ;
	}
	public function at($base,$altura)
	{
		$area = ($base * $altura)/2;
		echo "El area triangulo es ". $area;
	}
	public function bienvenida()
	{
	 $costo = 40;
	 $cantidad= 10;
	 $total = $costo * $cantidad;
	 return view ('practica1')
	 ->with('costo',$costo)
	 ->with('cantidad',$cantidad)
	 ->with('total',$total);
	}
	public function formulario()
	{
	 return view('formulario');
	}
	public function guardarinformacion(Request $request)
	{
	  $nombre = $request->nombre;
	  $edad = $request->edad;
	  $sexo = $request->sexo;
	  $correo = $request->correo;
	  $telefono = $request->telefono;
	  $rfc = $request->rfc;
	  $costo = $request->costo;
	  
	   $this->validate($request,[
	     'nombre'=>['regex:/^[A-Z][a-z,A-Z, ]*$/'],
		 'edad'=>'required|numeric|integer',
		 'correo'=>'required|email',
		 'telefono'=>['regex:/^[0-9]{10}$/'],
		 'rfc'=>['regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/'],
		 'costo'=>['regex:/^[0-9]*[.][0-9]{2}$/'],
	      ]);
      
	  echo "El nombre es $nombre";
	  echo "<br>El edad es $edad";
	  echo "<br>El sexo es $sexo";
	  echo "<br>El correo es $correo";
	  
		  
		  
	}
	public function formulario2()
	{
	 return view ('formulario2');	
	}
	public function guardarfc(Request $request)
	{
		$nombre  = $request->nombre;
		$sexo = $request->sexo;
		$estado = $request->estado;
		
		$this->validate($request,[
	     'nombre'=>['regex:/^[A-Z][a-z,A-Z, ]*$/'],
	      ]);
		
		echo "El nombre es : " .$nombre;
		echo "<br>El sexo es : ". $sexo;
		echo "<br>El estado es : ". $estado;
		
	}
	public function formulariocss()
	{
		return view ('formulariocss');
	}
	public function prueba(Request $request)
	{
		
	}
	
}












