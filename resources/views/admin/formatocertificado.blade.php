@extends('layouts.plantilla')
@section('title','solicitud')
@section('content')
<br>


<?php
  $codigo3= session('codigo_usu');

    $solicitante = session('codigosolicitante');
    $solicitud =session('idsolicituds');
    $dia= date("j");    
    $mes= date("n"); 
    $meses = array(" ","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $anio= date("Y");  
    
    $hoy= $dia." de ".$meses[$mes]." de ".$anio;
        
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
    <form action="{{('enviarcertificado')}}" method="POST">
@csrf
<label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for=""></label>

      <div class="bg-yellow-200 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">


        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">DETALLES DE LA CREACION DE CERTIFICADO</label>
     
         <h6>INFORMACIÓN DE LA SOLICITUD</h6>
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">REQUISITOS:

<label><?php echo $rest2 ['comentario']; ?></label>   

</label>
 
<input type="hidden" name="idusuariosolicitante" value="<?php echo $rest['id'];?>">
        
         <input type="hidden" name="idsolicitud" value="<?php echo $solicitud ?>">
         <input type="hidden" name="aprobadopor" value="<?php echo $codigo3 ?>">
         <input type="hidden" name="fecha" value="<?php echo $hoy ?>">
            
</label>

<?php

$consultita4="SELECT COUNT(id_solicitud) AS existe FROM `contable`  
WHERE 	id_solicitud=$solicitud";
$resultado4=mysqli_query($coneccion,$consultita4);
while($rest4=mysqli_fetch_array($resultado4)){
if($rest4['existe']==1){
  
$consultita5="SELECT *  FROM `contable`  
WHERE 	id_solicitud=$solicitud";
$resultado5=mysqli_query($coneccion,$consultita5);
while($rest5=mysqli_fetch_array($resultado5)){
?>
Usted realizo una consulta a contabilidad anteriormente.
<label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">RESPUESTA DE CONTABILIDAD :

  </label>
  <label for="">ORDEN: <?php echo $rest5['orden']?></label>
  <label for="">COBRO: <?php echo $rest5['cobro']?></label>
  <label for="">OTROS DETALLES: <?php echo $rest5['comen_res']?></label>
<?php


}
}
}

?>  


 <br>

      
    Complete el certificado con los datos correctos

<img src="https://pagos.cotel.bo/assets/admin/img/login.png" class="object-right-top object-scale-down h-16 w-full ">
      
<strong>
<label style=" margin-left: 80px;" class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">LA DIRECCIÓN DE RECURSOS HUMANOS DE COTEL R.L.</label>
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

<?php echo $rest['nombres_usu']." ".$rest ['apellidos_usu']; ?>
 </label></strong>
 <BR></BR>
 <textarea required name="contenido" id="contenido" cols="80" rows="7"></textarea>
<BR></BR>
 </label>

 <label style=" margin-left: 130px;" class="  text-center tracking-wide text-black ">Es cuanto certifico en honor a la verdad y sea para los fines consiguientes.</label>
<br>
<BR></BR>
<label style=" margin-left: 300px;"class=" tracking-wide text-center text-black ">La Paz 

 <?php echo $hoy; ?>
</label>
 
 <BR></BR>
 <?php
            }
        }
    ?>

        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
          <div class="row " style="margin: auto; width: 50%;">
            <button name="boton" value="aceptar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
           ENVIAR CERTIFICADO </button>

           
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection