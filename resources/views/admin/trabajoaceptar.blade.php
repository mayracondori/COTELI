@extends('layouts.plantillaadmin')
@section('title','solicitud')
@section('content')
<br>


<?php
  $codigo3= session('codigo_usu');

    $solicitante = $_GET['codigoempleado'];

    $solicitud = $_GET['id'];
    
    //echo $codigoempleado;
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
    <form action="{{('certificadopasouno')}}" method="POST">
@csrf
<label class="uppercase tracking-wide mb-2" for="">

      <div class="bg-yellow-200 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">


        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">DETALLES DE LA SOLICITUD PENDIENTE</label>
        <img src="{{url('../img/login.png')}}" class="object-right-top object-scale-down h-16 w-full ">
        <h1>INFORMACIÓN DE LA SOLICITUD</h1>


<table>
<tbody>
<tr>
<td><label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA DE SOLICITUD:</td>
<td> <input type="text"name="fechasolicitud" value="<?php echo $rest2 ['fecha_solicitud']; ?>">   </label></td>
</tr>
<tr>
<td><label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for=""> REQUISITOS DEL CERTIFICADO:</td>
<td> <label><?php echo $rest2 ['comentario']; ?></label>  
         <input type="hidden" name="remitente3" value="<?php echo $codigo3; ?>">
  </td>
</tr>

</tbody>
</table> 

        </label>
        

         <h6>INFORMACIÓN DEL SOLICITANTE</h6>

    
<table>
<tbody>
<tr>
<td><label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:</td>
<td>
        <input type="text" name="codigo" value="<?php echo $rest ['codigo_usu']; ?>">
        
        <input type="hidden" name="id" value="<?php echo $rest2['id']; ?>">
        <input type="hidden" name="comentarioger" value="<?php echo $rest2['comentario']; ?>">
        <input type="hidden" name="remitente3" value="<?php echo $codigo3; ?>">
        <input type="hidden" name="historialremit" value="<?php echo $rest2['historial_remitentes']; ?>">
        <input type="hidden" name="codigoempleado" value="<?php echo $solicitante; ?>">

        </label></td>

</tr>
<tr>
<td> <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE:
        </td>
        <td>
           <input type="text"  name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
        </label>
        </td>
</tr>

<tr>
<td>  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">GERENCIA:
      </td>
      <td> <input type="text"  name="gerencia" value="<?php
                $id=$rest['id'];
                 $consulta="SELECT g.nom_gerencia from usuario as u, gerencia as g where u.id = '$id'and g.id_gerencia =u.id_gerencia";
                 $gerencia = mysqli_query($coneccion, $consulta);
                 while($rest2 = mysqli_fetch_array($gerencia))
                 {
                 echo $rest2['nom_gerencia'] ;
                 }
                 ?>"

                 >
                </label>
</td>
</tr>
<tr>
<td><label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DEPARTAMENTO:</td>
<td>  <input type="text"name="departamento" value="<?php
            $id=$rest['id'];
             $consulta="SELECT d.nom_depto FROM usuario as u, departamento as d where u.id = '$id'and d.id_departamento =u.id_departamento";
             $gerencia = mysqli_query($coneccion, $consulta);
             while($rest2 = mysqli_fetch_array($gerencia))
             {
             echo $rest2['nom_depto'] ;
             }
             ?>"

             >
        </label>
</td>
</tr>

</tbody>
</table>



           

            
          

        <label class="uppercase text-black text-xs font-bold mb-2" for="">COMENTARIO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <textarea  name="comentario" id="comentario" cols="100" rows="5" >
          
        </textarea>

         <input type="hidden" name="idsolicitud" value="<?php echo $solicitud ?>">

        <?php

        }
    }
    ?>


        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
          <div class="row " style="margin: auto; width: 50%;">
            <button name="boton" value="aceptar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              CREAR CERTIFICADO 
            </button>

            <button name="boton" value="rechazar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              RECHAZAR SOLICITUD
            </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection