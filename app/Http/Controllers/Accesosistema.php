<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use Session;

class Accesosistema extends Controller
{
  public function login()
  {
	  return view('sistema.login');
  }
  public function valida(Request $request)
  {
	  $correo = $request->correo;
	  $password = $request->password;
	 
 	  $this->validate($request,[
	     'correo'=>'required|email',
		 'password'=>'required',
		  ]);
      $usuarios =usuarios::where('correo','=',$correo)
	                       ->where('password','=',$password)
						   ->where('activo','=','Si')
						   ->get();
	  if (count($usuarios)==0 )
	  { 
         Session::flash('error', 'El usuario no existe o la contraseña
                          		 no es correcta');
		 return redirect()->route('login');
	  }
	  else
	  {
		  Session::put('sesionname',$usuarios[0]->nombre . ' ' . $usuarios[0]->apellido);
		  Session::put('sesionidu',$usuarios[0]->idu);
		  Session::put('sesiontipo',$usuarios[0]->tipo);
		  Session::put('sesionarchivo',$usuarios[0]->archivo);
          return redirect()->route('reportemaestro');		  
	  }
	  
  }
  public function cerrarsesion()
  {
	   Session::forget('sesionname');
	   Session::forget('sesionidu');
	   Session::forget('sesiontipo');
	   Session::flush();
	   Session::flash('error', 'Session Cerrada Correctamente');
	   return redirect()->route('login');
  }
  
}









