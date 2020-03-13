<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clasificaciones;
use Session;

class clasificacioncontroller extends Controller
{
    
    public function reporteclasificaciones()
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
            $consulta= \DB::select("SELECT cl.idclas,
            cl.tipoclasi,cl.activo
            FROM clasificaciones AS cl");
            //return $consulta;
            return view ('clasificaciones.reporteclasificaciones')
            ->with('consulta',$consulta);
        }   
    }

    public function clasificaciones()
    {
        $resultados = clasificaciones::orderby('idclas','desc')
                    ->take(1)
                    ->get();
        $idssig = $resultados[0]->idclas + 1;
    	return view ('clasificaciones.clasificaciones')
        ->with('idssig',$idssig);

    }

    public function guardaclasificaciones(Request $request)
    {

    	$tipoclasi = $request->tipoclasi;

    	$this->validate($request,[
    		'tipoclasi'=>['regex:/[A-Z,a-z, ]*$/']
    	]);

        $classs = new clasificaciones;
        $classs -> idclas = $request->idclas;
        $classs -> tipoclasi = $request->tipoclasi;
        $classs -> save();


    	echo '<h1>Clasificacion Guardada<h1>';
    }

    public function modificaclas($idclas)
    {
        $sname = Session::get('sesionname');
        $sidu = Session::get('sessionidu');
        $stipo = Session::get('sesiontip');
        if ($sname =='' and $sidu =='' and $stipo=='') 
        {
            Session::flash('error','Es necesario loguearse antes de continar');
            return redirect()->route('login');
        }
        else
        {
        
            //echo "el maestro a modificar es $idm";
            $consulta = clasificaciones::Where('idclas','=',$idclas)
                   ->get();
            return view('clasificaciones.editaclasificaciones')
            ->with('consulta',$consulta[0]);
        }
        
    }
    public function editaclasifica(Request $request)
    {
        $idclas = $request->idclas;
        $tipoclasi = $request->tipoclasi;

        $this->validate($request,[
            'tipoclasi'=>['regex:/[A-Z,a-z, ]*$/']
        ]);

        $classs -> idclas = $request->idclas;
        $classs -> tipoclasi = $request->tipoclasi;
        $classs -> save();

            
        $proceso = "MODIFICA CLASIFICACION";
        $mensaje = "Registro modificado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);

    }

    public function eliminaclas($idclas)
    {
        
        //maestros::find($idm)->delete();
        $usuarios= \DB:: UPDATE("update clasificaciones 
        set activo = 'No' where idclas = $idclas");
        
        $proceso = "ELIMINA CLASIFICACION";
        $mensaje = "Registro desactivado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);
    }
    
    public function restauraclas($idclas)
    {
        
        $usuarios= \DB:: UPDATE("update clasificaciones 
        set activo = 'Si' where idclas= $idclas");
        
        $proceso = "RESTAURA CLASIFICACION";
        $mensaje = "Registro activado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);

    }
}
