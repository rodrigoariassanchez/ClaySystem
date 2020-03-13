<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class indexcontroller extends Controller
{
    public function index(){
    	return view('index');
    }

    public function comentarios(){
    	return view('comentarios');
    }
}
