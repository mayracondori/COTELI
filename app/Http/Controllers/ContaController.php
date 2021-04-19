<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\contable;
use DateTime;
use DateInterval;
use DatePeriod;

class ContaController extends Controller
{
    //
    public function index(){
        //metodo inicial
        return view('conta.index');
    }


    public function respondidas(){
        //metodo inicial
        return view('conta.respondidas');
    }


    public function pendientes(){
        //metodo inicial
        return view('conta.pendientes');
    }

    public function formaceptar(){
        //metodo inicial
        return view('conta.formaceptar');
    }

    public function aceptarsolicitud(Request $request){


          $id=$request->id;
         $resp=contable::findOrFail($id) ;
        $resp->orden=$request->orden;
        $resp->estado=1;
         $resp->cobro=$request->cobro;
         if($request->comentario==""){
            $request->comentario="sin comentario";
        }
            $resp->comen_res=$request->comentario;
    
            $resp->save();
           
         return view('conta.pendientes');
    }
}
