@extends('layouts.plantillaadmin')
@section('title','welcome')
@section('content')
<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
?>
<br>
<div class="bg-white mx-auto max-w-4xl py-5 px-5 sm:px-24 shadow-xl mb-16">
    <form action="{{route('admin.regisnoti')}}" method="post" autocomplete="off">
        @csrf

            <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">
                AGREGAR NOTIFICACIÓN</label>
            
            <div class="mx-16 md:flex mb-6">
              <div class="md:w1/2 px-3 mb-6md:mb-0">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                  TITULO DE LA NOTIFICACIÓN
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-32 mb-1" id="titulo" name="titulo" type="text" placeholder="titulo">
               
              </div>
            </div>
            <div class="mx-16 md:flex mb-6">
                <div class="md:w1/2 px-3 mb-6md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                    CONTENIDO DE LA NOTIFICACIÓN
                  </label> <br>
                  <pre><textarea class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-12 mb-1" name="descripcion"  id="descripcion" name="descripcion" placeholder="Descripcion del comunicado quedesea que tdos vean" cols="75" rows="5"></textarea></pre>
                </div>
              </div>
              <div class="mx-16 md:flex mb-6">
                <div class="md:w1/2 px-3 mb-6md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                    FECHA INICIO DE DONDE SE MOSTRARÁ LA NOTIFICACIÓN
                  </label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-32 mb-1" id="inicio" name="inicio" type="date" placeholder="">
                </div>
              </div>
              <div class="mx-16 md:flex mb-6">
                <div class="md:w1/2 px-3 mb-6md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                    FECHA FIN HASTA DONDE SE MOSTRARÁ LA NOTIFICACIÓN
                  </label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-32 mb-1" id="fin" name="fin" type="date" placeholder="">
                </div>
              </div>

            <div class="-mx-3 md:flex mt-2">
                <div class="md:w-full px-3">
                <button type="submit" class="md:w-full bg-orange-400 text-white hover:bg-yellow-400 font-bold py-2 px-32 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                  REGISTRAR
                </button>
              </div>
            </div>

        </form>
      </div>
@endsection
