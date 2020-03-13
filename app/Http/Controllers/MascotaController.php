<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mascotas;
use App\tipos;

class MascotaController extends Controller
{
    
	public function reportemascotas()
	{

		
		$consulta= \DB::select("SELECT m.idm,
		m.nombre,m.archivos,m.sexo, t.tipomas as masc
        FROM mascotas AS m INNER JOIN tipos AS t ON t.idt = m.idt");
		//return $consulta;
		return view ('reportemascotas')
		->with('consulta',$consulta);
		
	}

    public function altamascota()
	{
		$resultado = mascotas::orderby('idm','desc')
			->take(1)
			->get();
		$idsig = $resultado[0]->idm + 1;
		return view('altamascota')
		->with('idsig',$idsig);
	}

    public function guardarmascotas(Request $request)
	{
	  $nombre = $request->nombre;
	  $tipo = $request->tipo;
	  $this->validate($request,[
	     'archivo'=> 'mimes:jpeg,png,gif',
		  ]);
		  
     		$file = $request->file('archivo');
      	
            $ldate = date('Ymd_His_');
            $img = $file->getClientOriginalName();
            $img2 = $ldate.$img;
            \Storage::disk('local')->put($img2, \File::get($file));
        
	 
	    	$mascotas = new mascotas;
			$mascotas->idm = $request->idm;
			$mascotas->nombre = $request->nombre;
			$mascotas->tipo = $request->tipo;
			$mascotas->archivo=$img2;
			$mascotas->sexo = $request->sexo;
			$mascotas->save(); 
			
		echo "<h1>REGISTRO GUARDADO</h1>";
	}
}
