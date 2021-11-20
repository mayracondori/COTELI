<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class PlantillaController extends Controller
{
    public function plantilla(){
        //metodo inicial
        return view('layouts.plantilla');
    }
    public function plantillainicio(){
        //metodo inicial
        return view('layouts.plantillainicio');
    }
    public function plantillaadmin(){
        //metodo inicial
        return view('layouts.plantillaadmin');
    }
    public function plantillausuario(){
        //metodo inicial
        return view('layouts.plantillausuario');
    }
    public function plantillagerente(){
        //metodo inicial
        return view('layouts.plantillagerente');
    }
    public function cerrarsesion(){
       
        session_abort();
        session_unset();
        
        return redirect()->route('index');
        }





}
