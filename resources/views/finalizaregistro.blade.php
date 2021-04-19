
@extends('layouts.plantilla')
@section('title','REGISTRO')
@section('content')
@inject('Gerencias','App\Services\Gerencias')


<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
$codigo= session('codigo_usu');


 $codigo12 = "select * from datos_usu where Codigo=$codigo";
 $resultado12 = mysqli_query($coneccion, $codigo12);
 while ($rest12 = mysqli_fetch_array($resultado12)) {


?>
<div class="bg-gray-100 mx-auto max-w-3xl py-5 px-5 sm:px-24 shadow-xl mb-16">
<form action="{{route('registro')}}" method="post" autocomplete="off">

    @csrf

        <div class="text-center"> <label class="uppercase tracking-wide text-black text-xl font-bold mb-2">COMPLETE SU REGISTRO</label></div>
        <div class="mx-16 md:flex mb-6">
          <div class="md:w1/2 px-3 mb-6md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
              NOMBRES :
            </label>
            <input  value="<?php echo $rest12['Nombres']; ?>" class="  text-black "  style="text-transform:uppercase" id="nomber" name="nombre" type="text" placeholder="Nombres" readonly="readonly" required >
          </div>
        </div>
        <div class="mx-16 md:flex mb-6">
          <div class="md:w1/2 px-3 mb-6md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
              APELLIDOS :
            </label>
            <input value="<?php echo $rest12['Apellidos']; ?>" class=" text-black " style="text-transform:uppercase" id="apellido" name="apellido"  type="text" placeholder="Apellidos" readonly="readonly" required>
          </div>
        </div>
        <div class="mx-16 md:flex mb-6">
            <div class="md:w1/2 px-3 mb-6md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                CI :
              </label>
              <input value="<?php echo $rest12['Ci']; ?>" class="  text-black " id="ci" name="ci" type="text" placeholder="Número de carnet" readonly="readonly" required>
            </div>
          </div>
          <div class="mx-16 md:flex mb-6">
            <div class="md:w1/2 px-3 mb-6md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                CODIGO DE EMPLEADO :
              </label>
              <input value="<?php echo $rest12['Codigo']; ?>" class="  text-black " id="codigoempleado" name="codigoempleado" type="number" placeholder="Código de empleado" readonly="readonly" required>
            </div>
          </div>


              <input value="<?php echo $rest12['Fingreso']; ?>" class="  text-black " id="fechaingreso" name="fechaingreso" type="hidden" placeholder="Fecha" required>


              <input value="<?php echo $rest12['Cc']; ?>" class="  text-black " id="cc" name="cc" type="hidden" placeholder="Cc" required>
              <input type="hidden"   name="estado" >

        <div class="mx-16 md:flex mb-6">
            <div class="md:w1/2 px-3 mb-6md:mb-0">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                CORREO
              </label>
              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-12 mb-1" id="correo" name="correo" type="email" placeholder="Correo electronico" required>
            </div>
          </div>


          <div class="mx-16 md:flex mb-6">
            <div class="md:w1/2 px-3 mb-6md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                CELULAR
              </label>
              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-12 mb-1" id="celular" name="celular" type="number" placeholder="Número de celular" min="60000000" max="79999999" required>
            </div>
          </div>


          <div class="mx-16 md:flex mb-6">
            <div class="md:w1/2 px-3 mb-6md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                GERENCIA
              </label>

              <select required name="gerencia" id="gerencia">
             @foreach($Gerencias->get() as $index=>$gerencia)
             <option value="{{$index}}">
             {{$gerencia}}
             </option>
             @endforeach
              </select>
            </div>
          </div>
          <div class="mx-16 md:flex mb-6">
            <div class="md:w1/2 px-3 mb-6md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                DEPARTAMENTO
              </label>

              <select required name="departamento" id="departamento">


              </select>
            </div>
          </div>

          <div class="mx-16 md:flex mb-6">
            <div class="md:w1/2 px-3 mb-6md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                CONTRASEÑA
              </label>
              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-8 mb-1" id="contraseña" name="contraseña" type="password" placeholder="Contraseña" required>
            </div>
          </div>
        <div class="-mx-3 md:flex mt-2">
            <div class="md:w-full px-3">
            <button type="submit" class="md:w-full bg-yellow-400 text-white hover:bg-green-400 font-bold py-2 px-32 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              REGISTRAR
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>

<?php

    }

?>


@endsection
@section('script')
<script>
$(document).ready(function(){
  function loadDepartamento(){

          var id_gerencia =$('#gerencia').val();

          if($.trim(id_gerencia)!=''){
              $.get('departamentos',{id_gerencia: id_gerencia},function(departamentos){
                var old = $('#departamento').data('old') != '' ? $('#departamento').data('old') : '';
              $('#departamento').empty();
              $('#departamento').append( "<option value=''>Selecciona un departamento</option>");
              $.each(departamentos,function(index,value){
                $('#departamento').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");

              })
              });

          }
    }
    loadDepartamento();
    $('#gerencia').on('change',loadDepartamento);
});


</script>
@endsection
