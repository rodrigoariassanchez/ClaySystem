<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\generos;
use Session;

class generocontroller extends Controller
{
    public function reportegeneros()
    {
        $sname = Session::get('sesionname');
        $sidu = Session::get('sessionidu');
        $stipo = Session::get('sesiontipo');
        if ($sname =='' and $sidu =='' and $stipo=='') 
        {
            Session::flash('error','Es necesario loguearse antes de continar');
            return redirect()->route('login');
        }
        else
        {
            $consulta= \DB::select("SELECT cl.idgen,
            cl.genero,cl.activo
            FROM genero AS cl");
            //return $consulta;
            return view ('generos.reportegeneros')
            ->with('consulta',$consulta);
        }   
    }
    
    public function generos()
	{
		$resultadoss = generos::orderby('idgen','desc')
                    ->take(1)
                    ->get();
        $idsiig = $resultadoss[0]->idgen + 1;
        return view ('generos.generos')
        ->with('idsiig',$idsiig);
	}
    public function guardageneros(Request $request)
    {
    	$genero = $request->genero;

    	$this->validate($request,[
    		'genero'=>['regex:/[A-Z,a-z, ]*$/'],
    	]);

        $usu = new generos;
        $usu -> idgen = $request->idgen;
        $usu -> genero = $request->genero;
        $usu -> save();

    	echo '<h1>Dato Guardado satisfactoriamente</h1>';
    }
}
