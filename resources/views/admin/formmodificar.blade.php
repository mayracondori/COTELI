@extends('layouts.plantilla')
@section('title','ACEPTAR SOLICITUD')
@section('content')
<br>
@inject('Gerencias','App\Services\Gerencias')

<div class="mx-auto max-w-4xl bg-white py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form action="{{('modificarusuario')}}" method="POST">
@csrf
<label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">
          <script name="fecharespuesta">

              var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
              var f=new Date();
              document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
          </script></label>
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex-col ">
         <h6>INFORMACIÓN DEL USUARIO</h6>
         <?php
  $codigo= session('codigo_usu');

    $solicitante = $_GET['codigoempleado'];

    //echo $codigoempleado;
   $coneccion = mysqli_connect ("localhost", "root", "" );
   $basededatos = 'cotel';
   $bd =mysqli_select_db ($coneccion, $basededatos);

           $codigo = " SELECT u.id, u.nombres_usu, u.codigo_usu, u.apellidos_usu, g.nom_gerencia, d.nom_depto, t.nom_tipousuario
           FROM usuario AS u, gerencia AS g, departamento AS d, tipousuario AS t
           WHERE u.id_gerencia=g.id_gerencia and u.id_tipousuario=t.id_tipousuario and u.id_departamento=d.id_departamento AND codigo_usu=$solicitante";
           $resultado = mysqli_query($coneccion, $codigo);
           while ($rest = mysqli_fetch_array($resultado)) {



               ?>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:

        <input type="text" name="codigo" value="<?php echo $rest ['codigo_usu']; ?>">
        <input type="hidden" name="id" value="<?php echo $rest ['id']; ?>">
<br>
    </label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE:
            <input type="text"  name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
        </label>
        <br>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">GERENCIA ACTUAL:
            <input type="text"  name="gerencia1" value="<?php  echo $rest['nom_gerencia'] ;?>"  >
        </label>

<br>

            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DEPARTAMENTO ACTUAL:
            <input type="text"name="departamento1" value="<?php echo $rest['nom_depto'] ; ?>" >
        </label>
<br>
<div class="mx-16 md:flex mb-6">
    <div class="md:w1/2 px-3 mb-6md:mb-0">
      <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
        NUEVA GERENCIA
      </label>

      <select name="gerencia" id="gerencia">
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
        NUEVO DEPARTAMENTO
      </label>

      <select name="departamento" id="departamento">


      </select>
    </div>
  </div>


<label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">TIPO DE USUARIO ACTUAL :
            <input type="text"name="tipousuario" value="<?php echo $rest['nom_tipousuario'] ; ?>" >
        </label>
        <br>
<label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">TIPO DE USUARIO NUEVO :
<select name="tipousuarionuevo" id="tipousuarionuevo">
 <?php
 $coneccion = mysqli_connect ("localhost", "root", "" );
   $basededatos = 'cotel';
   $bd =mysqli_select_db ($coneccion, $basededatos);

           $codigo5 = "select * from tipousuario where nom_tipousuario != 'Administrador'";
           $resultado5 = mysqli_query($coneccion, $codigo5);
           while ($rest5 = mysqli_fetch_array($resultado5)) {

?>
 <option value="<?php echo $rest5['id_tipousuario'];?>"><?php echo $rest5['nom_tipousuario'];?> </option>
           <?php } ?>
 </select>
 </label>


        <?php


        }
        ?>
<br>






        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
          <div class="row " style="margin: auto;
  width: 50%;">
            <button name="boton" value="modificar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
             MODIFICAR EL TIPO DE USUARIO
            </button>


            </div>
          </div>
        </div>
      </div>
    </form>
  </div>




@endsection
@section('script2')
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
