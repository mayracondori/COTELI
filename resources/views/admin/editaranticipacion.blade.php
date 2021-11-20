@extends('layouts.plantillaadmin')
@section('title','EDITAR ANTICIPACION')
@section('content')
<br>


<?php
  $codigo3= session('codigo_usu');

      $antiid = $_GET['id'];
    //echo $codigoempleado;
   $coneccion = mysqli_connect ("localhost", "root", "" );
   $basededatos = 'cotel';
   $bd =mysqli_select_db ($coneccion, $basededatos);

           $codigo = "select * from anticipacion where id=$antiid ";
           $resultado = mysqli_query($coneccion, $codigo);
           while ($rest = mysqli_fetch_array($resultado)) {

                        ?>


<div class="mx-auto max-w-4xl bg-white py-5  lg:px-24 shadow-xl ">
    <form action="{{('fineditaranticipacion')}}" method="POST">
@csrf

      <div class="bg-yellow-200 shadow-md rounded  flex-col ">
      <img src="{{url('../img/login.png')}}"  class="object-center object-scale-down h-64 w-full ">


        <label class="uppercase tracking-wide text-black text-xl text-center font-bold ">INFORMACIÓN DE LA ANTICIPACION EN LA SOLICITUD</label>
        <input type="hidden" id="id" name="id" value="<?php echo $rest ['id']; ?>">
        <h4>Usted puede complemetar o cambiar los datos actuales</h4>
<BR>
        <label class="uppercase tracking-wide text-black text-xs font-bold " for="">TIPO DE SOLICITUD:

        <label for=""><?php echo $rest ['nombretipo']; ?> </label>
         </Label>
<br>
        

       <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">ACTUALES DIAS DE ANTICIPACION :
         <label  for="" ><?php echo $rest ['numero_dias']; ?></label> </label>
         <br>

         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">NUEVOS DIAS DE ANTICIPACION:
         <input type="text"name="dias" id="dias">   </label>
         <br>
         <BR>
  
<br>


        <?php

         }
    ?>


        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
          <div class="row " style="margin: auto;
  width: 50%;">
            <button name="boton" value="actualizar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              GUARDAR CAMBIOS
            </button>

            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

@endsection
