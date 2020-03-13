<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libros;
use App\clasificaciones;
use App\generos;
use Session;

class libroscontroller extends Controller
{
    public function reportelibros()
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
            $consultali= \DB::select("SELECT l.idli,
            l.nomli,l.autor,l.editorial,l.activo,l.archivo,g.genero as gen
            FROM libros AS l INNER JOIN generos AS g ON g.idgen = l.idgen");
            //return $consulta;
            return view ('libros.reportelibros')
            ->with('consultali',$consultali);   
        }
    }

    public function libros()
    {
        $resultados = libros::orderby('idli','desc')
                    ->take(1)
                    ->get();
        $clasificaciones = clasificaciones::orderby('tipoclasi','asc')
            ->get();
        $generos = generos::orderby('genero','asc')
            ->get();
        $idsigg = $resultados[0]->idli + 1; 
    	return view ('libros.libros')
        ->with('idsigg',$idsigg)
        ->with('generos',$generos)
        ->with('clasificaciones',$clasificaciones);
    }

    public function guardalibro(Request $request)
    {
    	$idli = $request->idli;
        $nomli = $request->nomli;
    	$editorial = $request->editorial;
    	$autor = $request->autor;
    	$idgen = $request->idgen;
        $paginas = $request->paginas;
    	$anoedi = $request->anoedi;
    	$precio = $request->precio;
    	$idclas = $request->idclas;
    	$estado = $request->estado;

    	$this->validate($request,[
            'nomli'=>['regex:/[A-Z][a-z, ,a-z,à,è,ì,ò,ù,ñ]*$/'],
            'editorial'=>['regex:/[A-Z,a-z][a-z,A-Z, ,à,è,ì,ò,ù,ñ]*$/'],
            'autor'=>['regex:/[A-Z,a-z][a-z,A-Z, ,à,è,ì,ò,ù,ñ]*$/'],
            'paginas'=>['regex:/[0-9]*$/'],
            'anoedi'=>['regex:/[0-9]{2}[-][A-Z,a-z]{3}[-][0-9]{4}$/'],
            'precio'=>['regex:/[0-9]*$/'],
            'estado'=>['regex:/[A-Z][a-z]*$/'],
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
        $libs = new libros;
        $libs -> idli = $request->idli;
        $libs -> nomli = $request->nomli;
        $libs -> editorial = $request->editorial;
        $libs -> autor = $request->autor;
        $libs -> idgen = $request->idgen;
        $libs -> paginas = $request->paginas;
        $libs -> anoedi = $request->anoedi;
        $libs -> precio = $request->precio;
        $libs -> idclas = $request->idclas;
        $libs -> estado = $request->estado;
        $usua -> archivo=$img2;
        $libs -> save();

        echo '<h1>Dato Guardado satisfactoriamente</h1>';
    }

    public function modificali($idli)
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
            $consulta = libros::Where('idli','=',$idli)
                   ->get();
            $generosel = generos::where('idgen','=',$consulta[0]->idgen)
                      ->get();
            $nomgen =$generosel[0]->genero;
            $generos = generos::where('idgen','!=',$consulta[0]->idgen)
                     ->get();
            $clasificacionsel = clasificaciones::where('idclas','=',$consulta[0]->idclas)
                      ->get();
            $nomclas =$clasificacionsel[0]->tipoclasi;
            $clasificaciones = clasificaciones::where('idclas','!=',$consulta[0]->idclas)
                     ->get();
            return view('libros.editalibros')
            ->with('consulta',$consulta[0])
            ->with('generos',$generos)
            ->with('idgensel',$consulta[0]->idgen)
            ->with('nomgen',$nomgen)
            ->with('clasificaciones',$clasificaciones)
            ->with('idclassel',$consulta[0]->idclas)
            ->with('nomclas',$nomclas);
        }
        
    }
    public function editalibros(Request $request)
    {
        $idli = $request->idli;
        $nomli = $request->nomli;
        $editorial = $request->editorial;
        $autor = $request->autor;
        $idgen = $request->idgen;
        $paginas = $request->paginas;
        $anoedi = $request->anoedi;
        $precio = $request->precio;
        $idclas = $request->idclas;
        $estado = $request->estado;

        $this->validate($request,[
            'nomli'=>['regex:/[A-Z][a-z, ,a-z,à,è,ì,ò,ù,ñ]*$/'],
            'editorial'=>['regex:/[A-Z,a-z][a-z,A-Z, ,à,è,ì,ò,ù,ñ]*$/'],
            'autor'=>['regex:/[A-Z,a-z][a-z,A-Z, ,à,è,ì,ò,ù,ñ]*$/'],
            'paginas'=>['regex:/[0-9]*$/'],
            'anoedi'=>['regex:/[0-9]{2}[-][A-Z,a-z]{3}[-][0-9]{4}$/'],
            'precio'=>['regex:/[0-9]*$/'],
            'estado'=>['regex:/[A-Z][a-z]*$/'],
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

        $libros = libros::find($idli);
        if($file!="")
        {
            $libros->archivo = $img2;
        }
        
        $libros -> idli = $request->idli;
        $libros -> nomli = $request->nomli;
        $libros -> editorial = $request->editorial;
        $libros -> autor = $request->autor;
        $libros -> idgen = $request->idgen;
        $libros -> paginas = $request->paginas;
        $libros -> anoedi = $request->anoedi;
        $libros -> precio = $request->precio;
        $libros -> idclas = $request->idclas;
        $libros -> estado = $request->estado;
        $libros -> save();
        
            
        $proceso = "MODIFICA LIBROS";
        $mensaje = "Registro modificado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);

    }

    public function eliminali($idli)
    {
        
        //maestros::find($idm)->delete();
        $libros= \DB:: UPDATE("update libros 
        set activo = 'No' where idli = $idli");
        

        $proceso = "ELIMINA libro";
        $mensaje = "Registro desactivado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);
        
    }
    
    public function restaurali($idli)
    {
        
        $libros= \DB:: UPDATE("update libros 
        set activo = 'Si' where idli= $idli");
        
        $proceso = "restaurar libro";
        $mensaje = "Registro activado correctamente";
        return view('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);
    }
}
