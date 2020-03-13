<?php
namespace App\Http\Controllers;

//use App\email;
use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller{
    
    public function enviar(){

        $data = array('nombre'=>"Laravel UTVT", "texto" => "Gmail de Laravel");
        
        Mail::send('mail', $data, function($message) {
        $message->to('al221810765@gmail.com', 'rodrigo')
            ->subject ('De Laravel 5.8 con Gmail', 'UTVT 2020.');
        $message->from('claysysteminkbook@gmail.com', 'Joseph B.');
        });

    
        if (Email:: failures()){
            return response ()->Fail('pisculpal Intenta mi tarde.' );
        }
    else{
    return response () -> json('sea enviado un email de GMAIL de ARAVEL 5.8');
    }


    }


}
