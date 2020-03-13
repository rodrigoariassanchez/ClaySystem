<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\logins;
use Session;

class accesocontroller extends Controller
{
    public function login()
    {
    	return view('login');
    }

    public function valida(Request $request)
	 {
	 	$correo = $request->correo;
	 	$password = $request->password;

	 	$this->validate($request,[
	 		'correo'=>'required|email',
	 		'password'=>'required',
	 	]);
	 	$logins = logins::where('correo','=',$correo)
	 								->where('password','=',$password)
	 								->where('activo','=','Si')
	 								->get();
	 	if (count($logins)==0)
	 	{
	 		Session::flash('error', 'El usuario no existe o la contraseña no es correcta');
	 		return redirect()->route('login');
	 	}
	 	else
	 	{
	 		Session::put('sesionname',$logins[0]->nombre . ' ' . $logins[0]->apellido);
	 		Session::put('sesionidlo',$logins[0]->idlo);
	 		Session::put('sesiontipo',$logins[0]->tipo);
	 		Session::put('sesionarchivo',$logins[0]->archivo);
	 		return redirect()->route('index');
	 	}
	 }

	 public function cerrarsesion()
	 {
	 	Session::forget('sesionname');
	 	Session::forget('sesionidlo');
	 	Session::forget('sesiontipo');
	 	Session::flush();
	 	Session::flash('error', 'Session Cerrada Correctamente');
	 	return redirect()->route('login');
	 }
}
