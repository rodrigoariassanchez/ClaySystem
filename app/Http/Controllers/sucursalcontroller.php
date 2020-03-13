<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sucursales;
use Session;

class sucursalcontroller extends Controller
{
    
    public function reportesucursal()
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
            $consulta= \DB::select("SELECT s.idsu,
            s.nombre,s.telefono,s.responsable,s.activo
            FROM sucursales AS s");
            //return $consulta;
            return view ('sucursal.reportesucursal')
            ->with('consulta',$consulta);
        }   
    }

    public function sucursales()
	{
		$resultado = sucursales::orderby('idsu','desc')
                    ->take(1)
                    ->get();
        $idsig = $resultado[0]->idus + 1;
        return view ('sucursal.sucursales')
        ->with('idsig',$idsig);
	}
    public function guardasucursales(Request $request)
    {
    	$nombre = $request->nombre;
    	$telefono = $request->telefono;
    	$responsable = $request->responsable;

    	$this->validate($request,[
    		'nombre'=>['regex:/[A-Z][a-z,A-Z, ]*$/'],
    		'telefono'=>['regex:/[0-9]*$/'],
    		'responsable'=>['regex:/[a-z]*$/']
    	]);

        $usua = new sucursales;
        $usua -> idsu = $request->idus;
        $usua -> nombre = $request->nombre;
        $usua -> telefono = $request->telefono;
        $usua -> responsable = $request->responsable;
        $usua -> save();

    	echo '<h1>Dato Guardado satisfactoriamente</h1>';
    }


    public function modificasu($idsu)
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
            $consulta = sucursales::Where('idsu','=',$idsu)
                   ->get();
            return view('sucursal.editasucursal')
            ->with('consulta',$consulta[0]);
        }
        
    }
    public function editasucursal(Request $request)
    {
        $idsu = $request->idsu;
        $nombre = $request->nombre;
        $telefono = $request->telefono;
        $responsable = $request->responsable;

        $this->validate($request,[
            'nombre'=>['regex:/[A-Z][a-z,A-Z, ]*$/'],
            'telefono'=>['regex:/[0-9]*$/'],
            'responsable'=>['regex:/[a-z]*$/']
        ]);
          
        $usua -> idsu = $request->idus;
        $usua -> nombre = $request->nombre;
        $usua -> telefono = $request->telefono;
        $usua -> responsable = $request->responsable;
        $usua -> save();

        
            
        $proceso = "MODIFICA USUARIO";
        $mensaje = "Registro modificado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);

    }

    public function eliminasu($idsu)
    {
        
        //maestros::find($idm)->delete();
        $usuarios= \DB:: UPDATE("update sucursales 
        set activo = 'No' where idsu = $idsu");
        
        $proceso = "ELIMINA USUARIO";
        $mensaje = "Registro desactivado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);
    }
    
    public function restaurasu($idsu)
    {
        
        $usuarios= \DB:: UPDATE("update sucursales 
        set activo = 'Si' where idsu= $idsu");
        
        $proceso = "ELIMINA USUARIO";
        $mensaje = "Registro desactivado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);

    }
}
