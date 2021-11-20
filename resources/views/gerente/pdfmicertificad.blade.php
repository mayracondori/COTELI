@extends('layouts.plantilla')
@section('title','admin')
@section('content')

<br>
<?php

$codigo1= session('codigo_usu');
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);

$idsolicitud= session('pdfcerti');
//echo $idsolicitud;

        $consultita=" SELECT s.id,c.titulo,u.nombres_usu,u.apellidos_usu,u.ci_usu,c.contenido,c.fecha
         from solicitud as s, certificado as c , usuario as u
         WHERE  s.id=$idsolicitud and s.id_usuario=u.id and c.id_solicitud=s.id";
         $resultado2=mysqli_query($coneccion,$consultita);
         while($rest2=mysqli_fetch_array($resultado2)){
         
            ?>
<div class="mx-auto max-w-4xl bg-yellow-100 py-5 px-12 lg:px-24 shadow-xl  mb-24">
 <form enctype="multipart/form-data" action="{{('micertificadoT')}}" method="POST">
@csrf
      <input type="hidden" name="idsolicitud" value="<?php echo $idsolicitud ?>">
<img src="{{url('../img/login.png')}}"  class="object-left-top object-scale-down h-20 w-full ">
<br>
<?php
      
                $utd="http://localhost/COTELI/public/qrcodes/qrcode".$idsolicitud.".png";
                ?>
                 <img style="margin: 0px 0px 0px 500px; "  src="<?php echo $utd;?>">

                 <label style="margin-left: 20px" for="">DRH-061/2021</label>
<br>
<BR></BR>

<strong>
<label style=" margin-left: 100px;" class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">LA DIRECCIÓN DE RECURSOS HUMANOS DE COTEL R.L.</label>
<br>
<label style=" margin-left: 100px;" class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">TELECOMUNICACIONES, EN CUANTO AL DERECHO LE</label>
<br>
<label style=" margin-left: 100px;" class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">PERMITE Y A SOLICITUD ESCRITA DE LA PARTE </label>
<br>
<label style=" margin-left: 100px;" class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">INTERESADA.</label>
<br>
<BR></BR>
       <br> <label style=" margin-left: 100px;">CERTIFICA:</label>
       </strong>
<BR></BR>

<br>

<label style=" margin-left: 130px;" class="  text-center tracking-wide text-black ">Que, según el registro de la Dirección de Recursos Humanos, </label>
<strong>
<label style=" margin-left: 130px;" class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">

<?php echo $rest2['nombres_usu']." ".$rest2['apellidos_usu'].","; ?>
</label>
</strong>
<p style=" margin-left: 130px;"> <?php echo $rest2['contenido']?></p>

<br>
<BR></BR>
<label style=" margin-left: 130px;" class="  text-center tracking-wide text-black ">Es cuanto certifico en honor a la verdad y sea para los fines consiguientes.</label>
<br>
<BR></BR>
<label style=" margin-left: 300px;"class=" tracking-wide text-center text-black ">La Paz 

<?php echo " ".$rest2['fecha']; ?>
</label>

<BR></BR>
<?php
         }
     
 ?>
<BR></BR>


        <button type="submit" class="md:w-full bg-yellow-400 text-white hover:bg-green-400 font-bold py-2 px-32 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              Imprimir
            </button>
           

      
    </form>
  </div>
  </div>
@endsection
