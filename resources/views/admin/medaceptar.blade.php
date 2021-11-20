@extends('layouts.plantillaadmin')
@section('title','solicitud')
@section('content')
<br>


<?php
use App\Models\Solicitud;
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

           $consultita=" SELECT s.id,t.nom_tiposolicitud,te.nom_tipoexcepcion,o.nom_opciones,s.fecha_solicitud,s.fechainicio,s.fechafin,s.comentario,s.historial_remitentes,SUBSTRING(s.foto_med, 8)AS foto_med
            from solicitud as s, tiposolicitud as t, tipoexcepcion as te,opcioneslista as o
            WHERE  s.id=$solicitud and s.id_tipoexcepcion= te.id_tipoexcepcion  and s.id_opcioneslista=o.id_opcioneslista
            and s.id_tiposolicitud=t.id_tiposolicitud";
            $resultado2=mysqli_query($coneccion,$consultita);
            while($rest2=mysqli_fetch_array($resultado2)){


               ?>


<div class="mx-auto max-w-4xl bg-yellow-100 py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form enctype="multipart/form-data" action="{{('aceptarsolicitud')}}" method="POST">
@csrf
<label class=" tracking-wide text-black text-xs font-bold mb-2" for=""></label>

      <div class="bg-yellow-200 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">


        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">DETALLES DE LA SOLICITUD PENDIENTE</label>
        <img src="{{url('../img/login.png')}}" class="object-right-top object-scale-down h-16 w-full ">
        <h1>INFORMACIÓN DE LA SOLICITUD</h1>
<table>
<tbody>
<tr>
<td> <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA DE SOLICITUD:</td>
<td><input type="text"name="fechasolicitud" value="<?php echo $rest2 ['fecha_solicitud']; ?>">   </label></td>
</tr>
<tr>
<td> <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA INICIO:</td>
<td> <input type="text"name="fechasolicitud" value="<?php echo $rest2 ['fechainicio']; ?>">   </label></td>
</tr>
<tr>
<td> <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA FIN:</td>
<td><input type="text"name="fechasolicitud" value="<?php echo $rest2 ['fechafin']; ?>">   </label></td>
</tr>
<tr>
<td> <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CANTIDAD DE DÍAS QUE SOLICITA:</td>
<td> <input type="text"name="DIAS" value="
         <?php
         
    $fecha1 = $rest2 ['fechainicio'];
    $fecha2 = $rest2 ['fechafin'];
    $date1 = new DateTime("$fecha1");
$date2 = new DateTime("$fecha2");
$diff = $date1->diff($date2);
// will output 2 days
echo $diff->days . ' días ';


?>
         
         
         ">   </label></td>
</tr>
</tbody>
</table>

            <?php
                $fotito=$rest2 ['foto_med'];
                $utd="http://localhost/COTELI/public/storage/".$fotito;
                    ?>




      <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DOCUMENTO DE RESPALDO:
      </label>
      <img src="<?php echo $utd;?>">


          <h6>INFORMACIÓN DEL SOLICITANTE</h6>
          <table>
          <tbody>
          <tr>
          <td><label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:
</td>
          <td>   
        <input type="text" name="codigo" value="<?php echo $rest ['codigo_usu']; ?>">
        <input type="hidden" name="id" value="<?php echo $rest ['id']; ?>">
        <input type="hidden" name="comentarioger" value="<?php echo $rest2['comentario']; ?>">
        <input type="hidden" name="remitente3" value="<?php echo $codigo3; ?>">
        <input type="hidden" name="historialremit" value="<?php echo $rest2['historial_remitentes']; ?>">


    </label></td>
          </tr>

          <tr>
          <td><label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE:</td>
         
         <td>  <input type="text"  name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
        </label>
         </td> </tr>
         <tr>
         <td> <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">GERENCIA:</td>
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
                </label></td>
         </tr>
         <tr>
         <td> <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DEPARTAMENTO:</td>
         <td><input type="text"name="departamento" value="<?php
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

        <textarea  name="comentario" id="comentario" cols="100" rows="5" placeholder="PUEDES INGRESAR UN COMENTARIO">

        </textarea>

         <input type="hidden" name="idsolicitud" value="<?php echo $solicitud ?>">

        <?php

        }
    }
    ?>


        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
          <div class="row " style="margin: auto;
  width: 50%;">
            <button name="boton" value="aceptar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              ACEPTAR SOLICITUD
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
