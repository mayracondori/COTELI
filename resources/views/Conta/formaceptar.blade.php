@extends('layouts.plantilla')
@section('title','ACEPTAR SOLICITUD')
@section('content')
<br>


<?php
  $codigo2= session('codigo_usu');

    $solicitud = $_GET['id'];
    //echo $codigoempleado;
   $coneccion = mysqli_connect ("localhost", "root", "" );
   $basededatos = 'cotel';
   $bd =mysqli_select_db ($coneccion, $basededatos);

         
           $consultita="  SELECT s.id,c.id as idp,c.comen_sol,c.fecha ,u.nombres_usu,u.apellidos_usu,u.codigo_usu FROM contable as c, solicitud as s,usuario as u where c.id=$solicitud and c.id_solicitud=s.id and s.id_usuario=u.id";
            $resultado2=mysqli_query($coneccion,$consultita);
            while($rest=mysqli_fetch_array($resultado2)){

               ?>

<div class="mx-auto max-w-4xl bg-white py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form action="{{('aceptarsolicitud')}}" method="POST">
@csrf
<label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">
          <script name="fecharespuesta">

              var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
              var f=new Date();
              document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
          </script></label>
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex-col ">


        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">DETALLES DE LA SOLICITUD PENDIENTE</label>
        <img src="https://pagos.cotel.bo/assets/admin/img/login.png" class="object-right-top object-scale-down h-16 w-full ">
        <h1>INFORMACIÓN DE LA SOLICITUD </h1>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA DE SOLICITUD:
         <input type="text"name="fechasolicitud" value="<?php echo $rest ['fecha']; ?>" readonly>   </label>
        <br>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">REQUISITOS:
        <br>
         <textarea type="text"name="comemn" cols="20" rows="5"  >  <?php echo $rest ['comen_sol']; ?> </textarea>
        <br>

     

         <h6>INFORMACIÓN DEL SOLICITANTE</h6>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:

        <input type="text" name="codigo" value="<?php echo $rest ['codigo_usu']; ?>">

        <input type="hidden" name="id" value="<?php echo $rest ['idp']; ?>">
       <br>
    </label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE DEL EMPLEADO :
            <input type="text"  name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
        </label>
    
<br>

    <label class="uppercase text-black text-xs font-bold mb-2" for="">ORDEN:
        <input style="border-color: rgb(255, 144, 0);"  name="orden" id="orden"  ></input>

<br>
        <label class="uppercase text-black text-xs font-bold mb-2" for="">COBRO:
        <input style="border-color: rgb(255, 144, 0);"  name="cobro" id="cobro"  ></input>
        <br>
        <label class="uppercase text-black text-xs font-bold mb-2" for="">OTROS DATOS:
        <textarea style="border-color: rgb(255, 144, 0);"  name="comentario" id="comentario" cols="100" rows="5" ></textarea>


         <input type="hidden" name="idsolicitud" value="<?php echo $solicitud ?>">

       
<?php
}
            
          
   ?>
       <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
          <div class="row " style="margin: auto; width: 50%;">
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



