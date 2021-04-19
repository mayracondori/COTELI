<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feriado extends Model
{
    use HasFactory;

    //direcciona a la tabla de la base de datos
    protected $table= "feriados";

}