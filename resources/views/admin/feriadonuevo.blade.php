@extends('layouts.plantilla')
@section('title','NUEVO FERIADO')
@section('content')
<br>


<?php
  $codigo3= session('codigo_usu');

                        ?>


<div class="mx-auto max-w-4xl bg-white py-5  lg:px-24 shadow-xl ">
    <form action="{{('nuevoferiadoform')}}" method="POST">
@csrf

      <div class="bg-yellow-200 shadow-md rounded  flex-col ">

      <img src="https://pagos.cotel.bo/assets/admin/img/login.png" class="object-center object-scale-down h-64 w-full ">

        <label class="uppercase tracking-wide text-black text-xl text-center font-bold ">INFORMACIÓN DEL FERIADO</label>
      
        <h4>Detalle el nuevo feriado</h4>
<BR>
        <label class="uppercase tracking-wide text-black text-xs font-bold " for="">FECHA :

        <input type="date" id="fecha" name="fecha" >
       </label>
       <BR><BR>
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for=""> DESCRIPCIÓN:
         <input type="text"name="descripcion" id="descripcion">   </label>
         <br>
         <BR>
        
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for=""> ESTADO :
<select name="estado" id="estado">
 
 <option value="0">INHABILITADO </option>
 <option value="1">HABILITADO </option>
          
 </select>
 </label>
 <input type="hidden" name="usu" id="usu" value="<?php echo $codigo3?>">
         
        

        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
          <div class="row " style="margin: auto;
  width: 50%;">
            <button name="boton" value="actualizar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
             CREAR
            </button>

            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

@endsection
