<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\detalle;
use Session;

class detallecontroller extends Controller
{
    public function detalle()
    {
    	$resultado = detalle::orderby('idd','desc')
                    ->take(1)
                    ->get();
        $idsg = $resultado[0]->idd + 1;
    	return view ('detalle')
    	->with('idsg',$idsg);

    }

    public function guardadetalle(Request $request)
    {	
    	$idren = $request->idren;
    	$idli = $request->idli;
    	$renta = $request->renta;
    	$idus = $request->idus;

    	$this->validate($request,[
    		'idren'=>['regex:/[0-9]*$/'],
    		'idli'=>['regex:/[0-9]*$/'],
    		'renta'=>['regex:/[0-9]*$/'],
    		'idus'=>['regex:/[0-9]*$/']
    	]);

        $usua = new detalle;
        $usua -> idd = $request->idd;
        $usua -> idren = $request->idren;
        $usua -> idli = $request->idli;
        $usua -> renta = $request->renta;
        $usua -> idus = $request->idus;
        $usua -> save();

    	echo '<h1>Dato Guardado satisfactoriamente</h1>';
    	
    }
}
