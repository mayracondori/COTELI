
@extends('layouts.plantillaadmin')
@section('title','EVALUACIONES')
@section('content')

<br><br>
<!--
<a href="nuevobloque"> <button class='bg-blue-400 text-white font-bold py-2 px-4 rounded hover:bg-green-500'>BLOQUES DE PREGUNTAS </button> </a>
<a href="listadepreguntas"> <button class='bg-blue-400 text-white font-bold py-2 px-4 rounded hover:bg-green-500'>LISTA DE PREGUNTAS </button> </a>
<a href="listadeevaluaciones"> <button class='bg-blue-400 text-white font-bold py-2 px-4 rounded hover:bg-green-500'>LISTA DE EVALUACIONES</button> </a>
<a href="fechaevaluacion"> <button class='bg-blue-400 text-white font-bold py-2 px-4 rounded hover:bg-green-500'>HABILITAR EVALUACIÓN</button> </a>

<a href="reporteseva"> <button class='bg-blue-400 text-white font-bold py-2 px-4 rounded hover:bg-green-500'>REPORTES</button> </a>

-->
    <form method="post" action="{{route('guardarconpr')}} " autocomplete="off" >
    @csrf


<center>
      <div style="width:1000px"class="bg-white  rounded px-8 pt-5  flex flex-col">
        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">NUEVA PREGUNTA</label>
     
        <select class="bg-gray-200 text-black border border-gray-200 py-3" name="Id_bloque" id="Id_bloque"  style="width:500px;">
                    <?php
                     $coneccion = mysqli_connect ("localhost", "root", "" );
                     $basededatos = 'cotel';
                     $bd =mysqli_select_db ($coneccion, $basededatos);
                  
                 $codigo85 = "select * from bloquepre";
                 $resultado85 = mysqli_query( $coneccion, $codigo85 );
                 echo "<option value='0' selected='selected'>Seleccionar</option>";
                 while( $rest85 = mysqli_fetch_array( $resultado85 ) )
                 { ?>
                 <option value="<?php echo $rest85['Id_bloque'];?>"> <?php echo $rest85['Nom_bloque'] ;?> </option>

                <?php
                }

                 ?>
                    </select>
              

            <br>
            <input  name="Titulo_pre" class=" py-3 px-4 mb-2  bg-gray-200 text-black border border-gray-200 rounded " id="Titulo_pre" type="text" placeholder="Titulo de competencia" required>
            <br>
            <input  name="Pregunta_pre" class=" py-3 px-4 mb-2  bg-gray-200 text-black border border-gray-200 rounded " id="Pregunta_pre" type="text" placeholder="Pregunta" required>
       
        </div>
        
        <div style="text-align:center" class=" mt-2">
            <div class=" px-3">
      
            <button type="submit" class=" bg-orange-400 text-white hover:bg-yellow-400 font-bold py-2 px-24 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full button">CREAR PREGUNTA</button>
          </div>
        </div>
       
      </div>
    </form>


    </center>
@endsection