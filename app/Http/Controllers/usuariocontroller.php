<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use Session;

class usuariocontroller extends Controller
{
    public function reporteusuarios()
    {
        $sname = Session::get('sesionname');
        $sidlo = Session::get('sessionidlo');
        $stipo = Session::get('sesiontipo');
        if ($sname =='' and $sidlo =='' and $stipo=='') 
        {
            Session::flash('error','Es necesario loguearse antes de continar');
            return redirect()->route('login');
        }
        else
        {
            $consulta= \DB::select("SELECT u.idus,
            u.nombre,u.apellido,u.telefono,u.calle,u.numero,u.archivo,u.activo
            FROM usuarios AS u");
            //return $consulta;
            return view ('reporteusuarios')
            ->with('consulta',$consulta);
        }   
    }

    public function usuarios()
	{
		$resultado = usuarios::orderby('idus','desc')
                    ->take(1)
                    ->get();
        $idsig = $resultado[0]->idus + 1;
        return view ('usuarios')
        ->with('idsig',$idsig);
	}
    public function guardausuario(Request $request)
    {
    	$nombre = $request->nombre;
    	$apellido = $request->apellidos;
    	$correo = $request->correo;
    	$contrasena = $request->contrasena;
    	$telefono = $request->telefono;
    	$calle = $request->calle;
    	$numero = $request->numero;
    	$municipio = $request->municipio;
    	$estado = $request->estado;
    	$cp = $request->cp;

    	$this->validate($request,[
    		'nombre'=>['regex:/[A-Z][a-z,A-Z, ]*$/'],
    		'apellido'=>['regex:/[A-Z,a-z][a-z,A-Z, ,à,è,ì,ò,ù,ñ]*$/'],
    		'correo'=>['regex:/[a-z,-,.,a-z]*[@][a-z]*[.][a-z]*$/'],
    		'contrasena'=>['regex:/[a-z,0-9]*$/'],
    		'telefono'=>['regex:/[0-9]{10}$/'],
    		'calle'=>['regex:/[A-Z,a-z, ,ñ]*$/'],
    		'numero'=>['regex:/[0-9]*$/'],
    		'municipio'=>['regex:/[A-Z,a-z, ]*$/'],
    		'estado'=>['regex:/[A-Z][a-z]*$/'],
    		'cp'=>['regex:/[0-9]{5}$/'],
            'archivo'=>'mimes:png,jpeg,gif',
    	]);
        $file = $request->file('archivo');
        if($file!="")
        {
            $ldate = date('Ymd_His_');
            $img = $file->getClientOriginalName();
            $img2 = $ldate.$img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }
        else
        {
            $img2 = "sinfoto.jpg";
        }

        $usua = new usuarios;
        $usua -> idus = $request->idus;
        $usua -> nombre = $request->nombre;
        $usua -> apellido = $request->apellido;
        $usua -> correo = $request->correo;
        $usua -> contrasena = $request->contrasena;
        $usua -> telefono = $request->telefono;
        $usua -> calle = $request->calle;
        $usua -> numero = $request->numero;
        $usua -> municipio = $request->municipio;
        $usua -> estado = $request->estado;
        $usua -> cp = $request->cp;
        $usua -> archivo=$img2;
        $usua -> save();

    	echo '<h1>Dato Guardado satisfactoriamente</h1>';
    }

    

    public function modificaus($idus)
    {
        $sname = Session::get('sesionname');
        $sidlo = Session::get('sessionidlo');
        $stipo = Session::get('sesiontip');
        if ($sname =='' and $sidlo =='' and $stipo=='') 
        {
            Session::flash('error','Es necesario loguearse antes de continar');
            return redirect()->route('login');
        }
        else
        {
        
            //echo "el maestro a modificar es $idm";
            $consulta = usuarios::Where('idus','=',$idus)
                   ->get();
            return view('editausuario')
            ->with('consulta',$consulta[0]);
        }
        
    }
    public function editausuario(Request $request)
    {
        $idus = $request->idus;
        $nombre = $request->nombre;
        $apellido = $request->apellidos;
        $correo = $request->correo;
        $contrasena = $request->contrasena;
        $telefono = $request->telefono;
        $calle = $request->calle;
        $numero = $request->numero;
        $municipio = $request->municipio;
        $estado = $request->estado;
        $cp = $request->cp;

        $this->validate($request,[
            'nombre'=>['regex:/[A-Z][a-z,A-Z, ]*$/'],
            'apellido'=>['regex:/[A-Z,a-z][a-z,A-Z, ,à,è,ì,ò,ù,ñ]*$/'],
            'correo'=>['regex:/[a-z,-,.,a-z]*[@][a-z]*[.][a-z]*$/'],
            'contrasena'=>['regex:/[a-z,0-9]*$/'],
            'telefono'=>['regex:/[0-9]{10}$/'],
            'calle'=>['regex:/[A-Z,a-z, ,ñ]*$/'],
            'numero'=>['regex:/[0-9]*$/'],
            'municipio'=>['regex:/[A-Z,a-z, ]*$/'],
            'estado'=>['regex:/[A-Z][a-z]*$/'],
            'cp'=>['regex:/[0-9]{5}$/'],
            'archivo'=>'mimes:png,jpeg,gif',
        ]);
          
        $file = $request->file('archivo');
        if($file!="")
        {
            $ldate = date('Ymd_His_');
            $img = $file->getClientOriginalName();
            $img2 = $ldate.$img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }

        $usuarios = usuarios::find($idus);
        if($file!="")
        {
            $usuarios->archivo = $img2;
        }
        
        $usuarios->idus = $request->idus;
        $usuarios->nombre = $request->nombre;
        $usuarios->apellido = $request->apellido;
        $usuarios->correo = $request->correo;
        $usuarios->contrasena = $request->contrasena;
        $usuarios->telefono = $request->telefono;
        $usuarios->calle = $request->calle;
        $usuarios->numero = $request->numero;
        $usuarios->municipio = $request->municipio;
        $usuarios->estado = $request->estado;
        $usuarios->cp = $request->cp;
        $usuarios->save();

        
            
        $proceso = "MODIFICA USUARIO";
        $mensaje = "Registro modificado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);

    }

    public function eliminau($idus)
    {
        
        //maestros::find($idm)->delete();
        $usuarios= \DB:: UPDATE("update usuarios 
        set activo = 'No' where idus = $idus");
        
        $proceso = "ELIMINA USUARIO";
        $mensaje = "Registro desactivado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);
    }
    
    public function restaurau($idus)
    {
        
        $usuarios= \DB:: UPDATE("update usuarios 
        set activo = 'Si' where idus= $idus");
        
        $proceso = "RESTAURA USUARIO";
        $mensaje = "Registro ha sido activado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);
    }
}
