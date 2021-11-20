@extends('layouts.plantillaadmin')
@section('title','ACEPTAR SOLICITUD')
@section('content')
<br>


<?php
  $codigo3= session('codigo_usu');

      $feriadoid = $_GET['id'];
    //echo $codigoempleado;
   $coneccion = mysqli_connect ("localhost", "root", "" );
   $basededatos = 'cotel';
   $bd =mysqli_select_db ($coneccion, $basededatos);

           $codigo = "select f.Fecha,f.id,f.Descripcion,f.estado,u.apellidos_usu,u.nombres_usu from feriados as f , usuario as u  where f.id=$feriadoid and f.id_usuario=u.id";
           $resultado = mysqli_query($coneccion, $codigo);
           while ($rest = mysqli_fetch_array($resultado)) {

                        ?>


<div class="mx-auto max-w-4xl bg-white py-5  lg:px-24 shadow-xl ">
    <form action="{{('fineditarferiado')}}" method="POST">
@csrf

      <div class="bg-yellow-200 shadow-md rounded  flex-col ">

      <img src="{{url('../img/login.png')}}"  class="object-center object-scale-down h-64 w-full ">

        <label class="uppercase tracking-wide text-black text-xl text-center font-bold ">INFORMACIÓN DEL FERIADO</label>
      
        <input type="hidden" id="id" name="id" value="<?php echo $rest ['id']; ?>">
        <h4>Usted puede complemetar o cambiar los datos actuales, si solo desea cambiar un atributo, deje los demas espacios en blanco</h4>
<BR>
        <label class="uppercase tracking-wide text-black text-xs font-bold " for="">FECHA ACTUAL:

        <label for=""><?php echo $rest ['Fecha']; ?> </label>
         </Label>
<br>
        <label class="uppercase tracking-wide text-black text-xs font-bold " for="">NUEVA FECHA:
 
        <input type="date" id="fecha" name="fecha"
      >
       </label>
       <BR><BR>

       <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DESCRIPCIÓN ACTUAL:
         <label  for="" ><?php echo $rest ['Descripcion']; ?></label> </label>
         <br>

         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">NUEVA DESCRIPCIÓN:
         <input type="text"name="descripcion" id="descripcion">   </label>
         <br>
         <BR>
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">ESTADO ACTUAL:
         <Label> <?php if($rest ['estado']==1){echo "HABILITADO";}else{echo "INHABILITADO";} ?>   </label></label>
         <br>
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">NUEVO ESTADO :
<select name="estado" id="estado">
 
 <option value="0">INHABILITADO </option>
 <option value="1">HABILITADO </option>
          
 </select>
 </label>
 <BR><br>
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CREADO POR:
            <h5><?php echo $rest ['nombres_usu']." ".$rest ['apellidos_usu'] ; ?></h5>
        </label>
        
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
