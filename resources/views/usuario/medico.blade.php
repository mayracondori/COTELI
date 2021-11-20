@extends('layouts.plantillausuario')
@section('title','usuario')

@section('content')
<?php
$codigo= session('codigo_usu');

?>
<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
?>
<div class="mx-auto max-w-4xl bg-white py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form enctype="multipart/form-data"
    action="{{route('usuario.solmedico')}}" method="POST" autocomplete="off">
@csrf
      <div class="bg-yellow-200 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
       <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">FORMULARIO BAJA MEDICA</label>
        <img src="{{url('../img/login.png')}}"  class="object-right-top object-scale-down h-16 w-full ">
        <table>
      <tr><td>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA DE SOLICITUD:
         
         </td>
         
         <td>
            <script name="fecha_solicitud">
                 var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                 var f=new Date();
                 document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
             </script></label></td>
          </tr>
          <tr>
          <td>
           <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:
               <?php  $codigo = "select * from usuario where codigo_usu=$codigo";
               $resultado = mysqli_query($coneccion, $codigo);
               while ($rest = mysqli_fetch_array($resultado)) {
                   ?>
   
   </td>
   <td>
               <input type="text"  name="codigo" value="<?php echo $rest ['codigo_usu']; ?>">
               <input type="hidden" name="id" value="<?php echo $rest ['id']; ?>">
               </td>
           </label>
           </tr>
           <tr>
           <td>
           <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE:
             </td>
             <td>
                 <input type="text" style="width : 200px;" name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
                 </td></label>
          </tr>
          <tr>
          <td>
           <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">GERENCIA:
             </td>
             <td>  <input type=»text» name="gerencia" value="<?php
               $id=$rest['id'];
                $consulta="SELECT g.nom_gerencia from usuario as u, gerencia as g where u.id= '$id'and g.id_gerencia =u.id_gerencia";
                $gerencia = mysqli_query($coneccion, $consulta);
                while($rest2 = mysqli_fetch_array($gerencia))
                {
                echo $rest2['nom_gerencia'] ;
                }
                ?>"
   
                >
           </label></td>  
   </tr><tr>
   <td>
               <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DEPARTAMENTO:
                 </td>      
                 <td>  <input type="text"  name="departamento" value="<?php
   
                   $id=$rest['id'];
                    $consulta="SELECT d.nom_depto FROM usuario as u, departamento as d where u.id= '$id'and d.id_departamento =u.id_departamento";
                    $gerencia = mysqli_query($coneccion, $consulta);
                    while($rest2 = mysqli_fetch_array($gerencia))
                    {
                    echo $rest2['nom_depto'] ;
                    }
                    ?>"
   
                    >
   
               </label>
               </td> 
               </table>
               <?php
           }
           ?>
 <div class="text-center">
            <span class="text-red-500 text-xs italic">
              TODAS LAS SOLICITUDES DE BAJA MEDICA DEBEN TENER UN DOCUMENTO DE RESPALDO
            </span>
          </div>

        <div class="-mx-3 md:flex mb-6">

          <div class="md:w-1/2 px-3">
<label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
    DOCUMENTO DE RESPALDO</label>

            <input type="file" accept="image/*" capture="camera" name="avatar" required></div>



        </div>





            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA INICIO</label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"  type="time" id="horainicio" name="horainicio"/>

                </div>
                <div class="md:w-1/2 px-3">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA FIN</label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"  type="time" id="horafin" name="horafin"/>

                </div>
            </div>



          <div class="text-center">
            <span class="text-red-500 text-xs italic">
              VERIFIQUE QUE LA FECHA SEA CORRECTA
            </span>
          </div>
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
              DE FECHA
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="fechainicio" name="fechainicio" type="date" required>

          </div>

          <div class="md:w-1/2 px-3">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
              A FECHA
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="fechafin" name="fechafin" type="date" required>
          </div>
        </div>

        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
            <button type="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              ENVIAR SOLICITUD
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
