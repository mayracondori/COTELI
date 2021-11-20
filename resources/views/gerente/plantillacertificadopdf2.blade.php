<!DOCTYPE html>
<html lang="es" style="margin: 0;">

<body style=" margin: 0mm 0mm 0mm 0mm;">
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


<div style="">
 <form enctype="multipart/form-data" action="{{('micertificado')}}" method="POST">
@csrf
      <input type="hidden" name="idsolicitud" value="<?php echo $idsolicitud ?>">


      <img src="{{url('../img/login.png')}}"  width="150" style="margin: 0px 0px 0px 500px; " >
      <?php
      
      $utd="http://localhost/COTELI/public/qrcodes/qrcode".$idsolicitud.".png";
      ?>
       <img style="margin: 0px 500px 0px 0px; "src="<?php echo $utd;?>">
<br> 
  
<br>
<label for="">DRH-061/2021</label>
<br>
<BR></BR>
<div style="opacity: 0.5;
color: BLACK;
position: absolute;
">
  <p  style="margin: 700px 5px 5px 5px; " > Av, Mariscal Santa Cruz No.980, Edificio Gran Centro 1, Apartado Postal 633, Centro Piloto: (591-2)2372323,Fax(591-2)2310331, La Paz-Bolivia,Pagina Web: www.cotel.bo </p>
     
</div>
<strong>
<label style=" margin-left: 100px;" class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">LA DIRECCIÓN DE RECURSOS HUMANOS DE COTEL R.L.</label>
<br>
<label style=" margin-left: 100px;" class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">TELECOMUNICACIONES, EN CUANTO AL DERECHO LE</label>
<br>
<label style=" margin-left: 100px;" class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">PERMITE Y A SOLICITUD ESCRITA DE LA PARTE </label>
<br>


<div style="opacity: 0.5;
color: BLACK;
position: absolute;
">
  <img src="{{url('../img/login.png')}}"  width="550" style="margin: 50px 400px 300px 100px; " >
     
</div>

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
</div>


</body>

</html>

