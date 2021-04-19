<?php
namespace App\Services;

use App\Models\gerencia;

class Gerencias
{
    public function get()
    {
        $gerencias = gerencia::get();
        $gerenciasArray['']='Selecciona una gerencia';
        foreach($gerencias as $gerencia){

        $gerenciasArray[$gerencia->id_gerencia]=$gerencia->nom_gerencia;

        }
        return $gerenciasArray;
    }

}