@extends('layouts.plantilla')
@section('title','solicitud')
@section('content')
<br>


<?php
  $codigo3= session('codigo_usu');

    $solicitante = session('codigosolicitante');
    $solicitud =session('idsolicituds');
  
    $coneccion = mysqli_connect ("localhost", "root", "" );
   $basededatos = 'cotel';
   $bd =mysqli_select_db ($coneccion, $basededatos);

           $codigo = "select * from usuario where codigo_usu=$solicitante";
           $resultado = mysqli_query($coneccion, $codigo);
           while ($rest = mysqli_fetch_array($resultado)) {
               
           $consultita=" SELECT s.id,s.comentario,t.nom_tiposolicitud,te.nom_tipoexcepcion,o.nom_opciones,s.fecha_solicitud,s.fechainicio,s.fechafin,s.comentario,s.historial_remitentes
            from solicitud as s, tiposolicitud as t, tipoexcepcion as te,opcioneslista as o
            WHERE  s.id=$solicitud and s.id_tipoexcepcion= te.id_tipoexcepcion  and s.id_opcioneslista=o.id_opcioneslista
            and s.id_tiposolicitud=t.id_tiposolicitud";
            $resultado2=mysqli_query($coneccion,$consultita);
            while($rest2=mysqli_fetch_array($resultado2)){
            
               ?>


<div class="mx-auto max-w-4xl bg-yellow-100 py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form action="{{('enviarcontabilidad')}}" method="POST">
@csrf
<label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for=""></label>

      <div class="bg-yellow-200 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">


        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">SOLICITUD DE INFORMACION A CONTABILIDAD</label>
     
         <h6>INFORMACIÓN DE LA SOLICITUD</h6>
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">REQUISITOS:
<br>
<textarea name="comensol" id="comensol"  placeholder="Necesito conocer ...... del usuario"  cols="60" rows="7"></textarea>
</label>
<input type="hidden" name="enviadopor" value="<?php echo $codigo3 ?>">
      
      <input type="hidden" name="idsolicitud" value="<?php echo $solicitud ?>">
       <input type="hidden" name="fecha" value=<?php $hoy=date('d-m-Y');
        echo $hoy;?> >     
</label>

</label>
 

 
 <?php
            }
        }
    ?>

        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
          <div class="row " style="margin: auto; width: 50%;">
            <button name="boton" value="aceptar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
           ENVIAR SOLICITUD </button>

           
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection