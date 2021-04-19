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




}
