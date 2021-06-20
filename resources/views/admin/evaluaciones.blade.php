
@extends('layouts.plantilla')
@section('title','EVALUACIONES')
@section('content')

<br><br>

<a href="nuevotiporesp"> <button class='bg-blue-400 text-white font-bold py-2 px-4 rounded hover:bg-green-500'>CREAR NUEVO TIPO DE RESPUESTA </button> </a>


    <form method="post" action="{{route('index')}} " autocomplete="off" >
    @csrf



      <div class="bg-white shadow-md rounded px-8 pt-5 pb-1 mb-4 flex flex-col">
        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">NUEVA PREGUNTA</label>
        <div class="mx-16 md:flex mb-6">
          
            <br>
            <input  name="Pregunta_pre" class=" py-3 px-4 mb-2 w-full bg-gray-200 text-black border border-gray-200 rounded " id="Pregunta_pre" type="text" placeholder="Pregunta" required>
       
        </div>
           
        <div class="mx-16 md:flex mb-6">
          <div class="md:w1/2 px-3 mb-6md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
              Qué respuestas estarán habilitadas para esta pregunta? Puede marcar más de una :
            </label>
            <BR></BR>
            <div class="row">
<?php
   $coneccion = mysqli_connect ("localhost", "root", "" );
   $basededatos = 'cotel';
   $bd =mysqli_select_db ($coneccion, $basededatos);

           $codigo = "select * from tiporespuesta where Estado_tipores=1";
           $resultado = mysqli_query($coneccion, $codigo);
           while ($rest = mysqli_fetch_array($resultado)) {
               ?>

<div class="md:w1/2 px-3 mb-6md:mb-0">
        <input class="py-3 px-4 mb-2"  type="checkbox"  name="<?php echo "ch".$rest['Id_tiporesp']?>"  value="<?php echo $rest['Id_tiporesp']?>" class="form-checkbox h-5 w-5 text-blue-600" ><span class="ml-2 text-gray-700"><?php echo $rest['Nom_tipores']?></span>
       </div>
        <?php
           }
        ?>
        </div>
            
          </div>
        </div>
        <div class="-mx-2 md:flex mt-2">
            <div class="md:w-full px-3">
            <button type="submit" class="md:w-full bg-blue-400 text-white hover:bg-green-400 font-bold py-2 px-24 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full button">CREAR PREGUNTA</button>
          </div>
        </div>
       
      </div>
    </form>



@endsection