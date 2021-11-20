
@extends('layouts.plantillaadmin')
@section('title','admin')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">


    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>
</div>


<div class="mx-auto max-w-4x3">
            <?php
            $coneccion = mysqli_connect ("localhost", "root", "" );
            $basededatos = 'cotel';
            $bd =mysqli_select_db ($coneccion, $basededatos);
            $anioactual=date("Y");

             ?>
<h1 class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2"> <p class="text-4xl ">Reportes por gerencias seleccione una</p> </h1>
<br>

<div class="grid grid-cols-3 gap-4">
    <div class="..."></div>
    <div class="row bg-yellow-200 " >
        <input type="radio" id="sistemas" name="opcion" value="1" required>
        <label for="male">Gerencia de Sistemas</label><br>
        <input type="radio" id="recursos" name="opcion" value="2" required>
        <label for="female">Gerencia de Recursos Humanos</label><br>
        <input type="radio" id="tercera" name="opcion" value="3" required>
        <label for="other">Gerencia planificación y desarrollo</label><br>
        <input type="radio" id="cuarta" name="opcion" value="4" required>
        <label for="other">Gerencia Técnica</label><br>
        <input type="radio" id="quinta" name="opcion" value="5" required>
        <label for="male">Gerencia Administrativa financiera</label><br>
        <input type="radio" id="sexta" name="opcion" value="6" required>
        <label for="male">Gerencia de comercial</label><br>
    </div>
  </div>


        <div id="div1"  style="display:none">
        <h1 class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2"> <p class="text-4xl ">REPORTE: GERENCIA SISTEMAS</p> </h1>




    <!--Nav-->



    <div class="mx-auto max-w-4x3">
        <div class="main-content bg-gray-500 mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="flex flex-row flex-wrap flex-grow mt-2">

                <div class="md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class=" text-center font-bold uppercase text-gray-600"> TODAS LAS SOLICITUDES REALIZADAS</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-7"), {
                                    "type": "bar",
                                    "data": {
<?php
$meses = array(" ","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
if(date('n')==1){
    $primermes= 10;
    $segundomes= 11;
    $tercermes= 12;
    $cuartomes= 1;


}else{

if(date('n')==2){
    $primermes= 11;
    $segundomes= 12;
    $tercermes= 1;
    $cuartomes= 2;


}else{


    if(date('n')==3){
        $primermes= 12;
        $segundomes= 1;
        $tercermes= 2;
        $cuartomes= 3;


    }else{
        $primermes= date('n')-3;
    $segundomes= date('n')-2;
    $tercermes= date('n')-1;
    $cuartomes= date('n');

    }


}

}

$anio=date("Y")-1;
if($cuartomes==1 ||$cuartomes==2|| $cuartomes==3){
    $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
    FROM solicitud as s, usuario as u
    where MONTH(s.fecha_solicitud)=$primermes and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='1'
    group by s.id_tiposolicitud";



    $resultado1 = mysqli_query($coneccion, $codigo1);
    $primermesotras=0;
    $primermesboleta=0;
    $primermescer=0;
    $primermesexcep=0;
    $primermesmed=0;
    while ($rest1 = mysqli_fetch_array($resultado1)) {

        if($rest1['id_tiposolicitud']=='1'){
        $primermesexcep=$rest1['suma'];
        }else{
        if($rest1['id_tiposolicitud']=='2'){

            $primermesboleta=$rest1['suma'];

        }else{
            if($rest1['id_tiposolicitud']=='3'){
            $primermescer=$rest1['suma'];
            }else{
            if($rest1['id_tiposolicitud']=='4'){
            $primermesmed=$rest1['suma'];
            }
            }
        }

        }

        }



}else{
    $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
    FROM solicitud as s, usuario as u
    where MONTH(s.fecha_solicitud)=$primermes and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='1'
    group by s.id_tiposolicitud";



    $resultado1 = mysqli_query($coneccion, $codigo1);
    $primermesotras=0;
    $primermesboleta=0;
    $primermescer=0;
    $primermesexcep=0;
    $primermesmed=0;
    while ($rest1 = mysqli_fetch_array($resultado1)) {

        if($rest1['id_tiposolicitud']=='1'){
        $primermesexcep=$rest1['suma'];
        }else{
        if($rest1['id_tiposolicitud']=='2'){

            $primermesboleta=$rest1['suma'];

        }else{
            if($rest1['id_tiposolicitud']=='3'){
            $primermescer=$rest1['suma'];
            }else{
            if($rest1['id_tiposolicitud']=='4'){
            $primermesmed=$rest1['suma'];
            }
            }
        }

        }

        }




}



        $primermesotras=$primermesexcep+$primermesboleta+$primermescer+$primermesmed;

        if($cuartomes==1|| $cuartomes==2){

            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$segundomes and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='1'
            group by s.id_tiposolicitud";
            $resultado1 = mysqli_query($coneccion, $codigo1);
            $segundomesotras=0;
            $segundomesboleta=0;
            $segundomescer=0;
            $segundomesexcep=0;
            $segundomesmed=0;
            while ($rest1 = mysqli_fetch_array($resultado1)) {

                if($rest1['id_tiposolicitud']=='1'){
                  $segundomesexcep=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='2'){

                    $segundomesboleta=$rest1['suma'];

                  }else{
                    if($rest1['id_tiposolicitud']=='3'){
                      $segundomescer=$rest1['suma'];
                    }else{
                      if($rest1['id_tiposolicitud']=='4'){
                     $segundomesmed=$rest1['suma'];
                      }
                    }
                  }

                  }

                }

        }else{

            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
        FROM solicitud as s, usuario as u
        where MONTH(s.fecha_solicitud)=$segundomes and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='1'
        group by s.id_tiposolicitud";
        $resultado1 = mysqli_query($coneccion, $codigo1);
        $segundomesotras=0;
        $segundomesboleta=0;
        $segundomescer=0;
        $segundomesexcep=0;
        $segundomesmed=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $segundomesexcep=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $segundomesboleta=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $segundomescer=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $segundomesmed=$rest1['suma'];
                  }
                }
              }

              }

            }

        }

            $segundomesotras=$segundomesexcep+$segundomesboleta+$segundomescer+$segundomesmed;

if($cuartomes==1){
    $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
    FROM solicitud as s, usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='1'
    group by s.id_tiposolicitud";
$resultado1 = mysqli_query($coneccion, $codigo1);
$tercermesotras=0;
$tercermesboleta=0;
$tercermescer=0;
$tercermesexcep=0;
$tercermesmed=0;
while ($rest1 = mysqli_fetch_array($resultado1)) {

    if($rest1['id_tiposolicitud']=='1'){
      $tercermesexcep=$rest1['suma'];
    }else{
      if($rest1['id_tiposolicitud']=='2'){

        $tercermesboleta=$rest1['suma'];

      }else{
        if($rest1['id_tiposolicitud']=='3'){
          $tercermescer=$rest1['suma'];
        }else{
          if($rest1['id_tiposolicitud']=='4'){
         $tercermesmed=$rest1['suma'];
          }
        }
      }

      }

    }



}else{

    $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
    FROM solicitud as s, usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='1'
    group by s.id_tiposolicitud";
$resultado1 = mysqli_query($coneccion, $codigo1);
$tercermesotras=0;
$tercermesboleta=0;
$tercermescer=0;
$tercermesexcep=0;
$tercermesmed=0;
while ($rest1 = mysqli_fetch_array($resultado1)) {

    if($rest1['id_tiposolicitud']=='1'){
      $tercermesexcep=$rest1['suma'];
    }else{
      if($rest1['id_tiposolicitud']=='2'){

        $tercermesboleta=$rest1['suma'];

      }else{
        if($rest1['id_tiposolicitud']=='3'){
          $tercermescer=$rest1['suma'];
        }else{
          if($rest1['id_tiposolicitud']=='4'){
         $tercermesmed=$rest1['suma'];
          }
        }
      }

      }

    }


}

            $tercermesotras=$tercermesexcep+$tercermesboleta+$tercermescer+$tercermesmed;
            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$cuartomes and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='1'
            group by s.id_tiposolicitud";
        $resultado1 = mysqli_query($coneccion, $codigo1);
        $cuartomesotras=0;
        $cuartomesboleta=0;
        $cuartomescer=0;
        $cuartomesexcep=0;
        $cuartomesmed=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $cuartomesexcep=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $cuartomesboleta=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $cuartomescer=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $cuartomesmed=$rest1['suma'];
                  }
                }
              }

              }

            }
            $cuartomesotras=$cuartomesexcep+ $cuartomesboleta+$cuartomescer+$cuartomesmed;
    ?>
                                        "labels": ["<?php echo  $meses[$primermes];?>", "<?php echo $meses[$segundomes];?>", "<?php echo $meses[$tercermes];?>", "<?php echo $meses[$cuartomes];?>"],
                                        "datasets": [{
                                            "label": "TODAS",
                                            "data": [<?php echo  $primermesotras;?>, <?php echo  $segundomesotras;?>, <?php echo  $tercermesotras;?>, <?php echo  $cuartomesotras;?>],
                                            "borderColor": "rgb(255, 99, 132)",
                                            "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                        }, {
                                            "label": "EXCEPCIONES",
                                            "data": [<?php echo  $primermesexcep;?>, <?php echo  $segundomesexcep;?>, <?php echo  $tercermesexcep;?>, <?php echo  $cuartomesexcep;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 162, 235)"
                                        },{
                                            "label": "BOLETAS",
                                            "data": [<?php echo  $primermesboleta;?>, <?php echo  $segundomesboleta;?>, <?php echo  $tercermesboleta;?>, <?php echo  $cuartomesboleta;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(240, 0, 0)"
                                        }
                                        ,{
                                            "label": "CERTIFICADOS",
                                            "data": [<?php echo  $primermescer;?>, <?php echo  $segundomescer;?>, <?php echo  $tercermescer;?>, <?php echo  $cuartomescer;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(0, 0,200)"
                                        }
                                        ,{
                                            "label": "BAJAS",
                                            "data": [<?php echo  $primermesmed;?>, <?php echo  $segundomesmed;?>, <?php echo  $tercermesmed;?>, <?php echo  $cuartomesmed;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 255, 235)"
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>




                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES ANUALES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-0"), {
                                    <?php
                                         $primeranio= date('Y')-3;
                                         $segundoanio= date('Y')-2;
                                         $terceranio= date('Y')-1;
                                         $cuartoanio= date('Y');

$codigo10 = "SELECT year(s.fecha_solicitud) as year ,COUNT(*) as valor FROM solicitud as s,usuario as u
WHERE s.id_usuario=u.id and u.id_gerencia='1'
group by year(s.fecha_solicitud)";
$resultado10 = mysqli_query($coneccion, $codigo10);
$primeraniosol=0;
$segundoaniosol=0;
$terceraniosol=0;
$cuartoaniosol=0;
while ($rest10 = mysqli_fetch_array($resultado10)) {


if($rest10['year']==$primeranio){
    $primeraniosol=$rest10['valor'];
}else{
    if($rest10['year']==$segundoanio){
        $segundoaniosol=$rest10['valor'];
    }else{
        if($rest10['year']==$terceranio){
            $terceraniosol=$rest10['valor'];

        }else{
            if($rest10['year']==$cuartoanio){
                $cuartoaniosol=$rest10['valor'];
            }
        }
    }
}
}


                                        ?>
                                    "type": "line",
                                    "data": {
                                        "labels": ["<?php echo  $primeranio ;?>", "<?php echo $segundoanio ;?>", "<?php echo $terceranio ;?>", "<?php echo $cuartoanio ;?>"],
                                        "datasets": [{
                                            "label": "SOLICITUDES",
                                            "data": [<?php echo  $primeraniosol ;?>, <?php echo $segundoaniosol ;?>, <?php echo $terceraniosol ;?>, <?php echo $cuartoaniosol ;?>],
                                            "fill": false,
                                            "borderColor": "rgb(75, 192, 192)",
                                            "lineTension": 0.1
                                        }]
                                    },
                                    "options": {}
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>
                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                     <!--Graph Card-->
                     <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES DEL ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-95" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-95"), {
                                    "type": "bar",
                                    "data": {
<?php
if($cuartomes==1){

$codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
FROM solicitud as s,usuario as u
where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='1'
group by s.id_tiposolicitud ";
$resultado9 = mysqli_query($coneccion, $codigo9);
$excepcionesmes1=0;
$boletames1=0;
$certificadomes1=0;
$medicomes1=0;

while ($rest9 = mysqli_fetch_array($resultado9)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];
if($rest9['id_tiposolicitud']=='1'){
    $excepcionesmes1=$rest9['valor'];
}else{
    if($rest9['id_tiposolicitud']=='2'){
        $boletames1=$rest9['valor'];
    }else{
        if($rest9['id_tiposolicitud']=='3'){
            $certificadomes1=$rest9['valor'];

        }else{
            if($rest9['id_tiposolicitud']=='4'){
                $medicomes1=$rest9['valor'];
            }
        }
    }
}
}

}else{


    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
    FROM solicitud as s,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='1'
    group by s.id_tiposolicitud ";
    $resultado9 = mysqli_query($coneccion, $codigo9);
    $excepcionesmes1=0;
    $boletames1=0;
    $certificadomes1=0;
    $medicomes1=0;

    while ($rest9 = mysqli_fetch_array($resultado9)) {

    //$tiposolicitud=$rest['id_tiposolicitud'];
    //$valor=$rest['valor'];
    if($rest9['id_tiposolicitud']=='1'){
        $excepcionesmes1=$rest9['valor'];
    }else{
        if($rest9['id_tiposolicitud']=='2'){
            $boletames1=$rest9['valor'];
        }else{
            if($rest9['id_tiposolicitud']=='3'){
                $certificadomes1=$rest9['valor'];

            }else{
                if($rest9['id_tiposolicitud']=='4'){
                    $medicomes1=$rest9['valor'];
                }
            }
        }
    }
    }
}


    ?>


                                        "labels": ["EXCEPCIONES", "CERTIFICADOS", "BOLETAS", "BAJAS MEDICAS"],
                                        "datasets": [{
                                            "label": " <?php  echo $meses[$tercermes];?>",
                                            "data": [<?php  echo $excepcionesmes1;?>, <?php  echo $certificadomes1;?>, <?php  echo $boletames1;?>, <?php  echo $medicomes1;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">EXCEPCIONES ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-1"), {
                                    "type": "bar",
                                    "data": {


                                        <?php
if($cuartomes==1){

    $codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor
    FROM solicitud as s ,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='1'
    group by s.id_tipoexcepcion";
    $resultado9 = mysqli_query($coneccion, $codigo9);
    $permisomes=0;
    $vacacionesmes=0;
    $comisionmes=0;
    while ($rest9 = mysqli_fetch_array($resultado9)) {

    //$tiposolicitud=$rest['id_tiposolicitud'];
    //$valor=$rest['valor'];
    if($rest9['id_tipoexcepcion']=='1'){
        $permisomes=$rest9['valor'];
    }else{
        if($rest9['id_tipoexcepcion']=='2'){
            $vacacionesmes=$rest9['valor'];
        }else{
            if($rest9['id_tipoexcepcion']=='3'){
                $comisionmes=$rest9['valor'];

            }else{
                }
            }
        }

    }
}else{


    $codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor
    FROM solicitud as s ,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='1'
    group by s.id_tipoexcepcion";
    $resultado9 = mysqli_query($coneccion, $codigo9);
    $permisomes=0;
    $vacacionesmes=0;
    $comisionmes=0;
    while ($rest9 = mysqli_fetch_array($resultado9)) {

    //$tiposolicitud=$rest['id_tiposolicitud'];
    //$valor=$rest['valor'];
    if($rest9['id_tipoexcepcion']=='1'){
        $permisomes=$rest9['valor'];
    }else{
        if($rest9['id_tipoexcepcion']=='2'){
            $vacacionesmes=$rest9['valor'];
        }else{
            if($rest9['id_tipoexcepcion']=='3'){
                $comisionmes=$rest9['valor'];

            }else{
                }
            }
        }

    }


}
    ?>
                                        "labels": ["VACACIONES", "COMISIONES", "PERMISOS"],
                                        "datasets": [{
                                            "label": "<?php  echo $meses[$tercermes];?>",
                                            "data": [<?php  echo $vacacionesmes;?>, <?php  echo $comisionmes;?>, <?php  echo $permisomes;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes realizadas</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-4"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["Excepciones", "Boleta de pago", "Certificado", "Baja Medica"],
                                        "datasets": [{
                                            "label": "Issues",

<?php
$anioactual=date("Y");
$codigo = "SELECT s.id_tiposolicitud, COUNT(*) as valor
FROM solicitud as s , usuario as u
where year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='1'
group by s.id_tiposolicitud";
$resultado = mysqli_query($coneccion, $codigo);
$excepciones=0;
$boleta=0;
$certificado=0;
$medico=0;

while ($rest = mysqli_fetch_array($resultado)) {
if($rest['id_tiposolicitud']=='1'){
    $excepciones=$rest['valor'];
}else{
    if($rest['id_tiposolicitud']=='2'){
        $boleta=$rest['valor'];
    }else{
        if($rest['id_tiposolicitud']=='3'){
            $certificado=$rest['valor'];

        }else{
            if($rest['id_tiposolicitud']=='4'){
                $medico=$rest['valor'];
            }
        }
    }
}
}
?>

                                           "data": [<?php echo $excepciones;?>,<?php echo $boleta;?>, <?php echo $certificado;?>, <?php echo $medico;?>],

                                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)", "rgb(50, 20, 86)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes  de tipo excepcion realizadas en el año</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-20" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-20"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["VACACION", "PERMISO", "COMISION"],
                                        "datasets": [{
                                            "label": "Issues",

<?php
$anioactual=date("Y");
$codigo = "SELECT s.id_tipoexcepcion, COUNT(*) as valor FROM solicitud as s , usuario as u
WHERE year(s.fecha_solicitud)='$anioactual' and s.id_usuario=u.id and u.id_gerencia='1'
group by s.id_tipoexcepcion";
$resultado = mysqli_query($coneccion, $codigo);
$permiso=0;
$vacacion=0;
$comision=0;
while ($rest = mysqli_fetch_array($resultado)) {

if($rest['id_tipoexcepcion']=='1'){
    $permiso=$rest['valor'];
}else{
    if($rest['id_tipoexcepcion']=='2'){
        $vacacion=$rest['valor'];
    }else{
        if($rest['id_tipoexcepcion']=='3'){
            $comision=$rest['valor'];

        }else{

        }
    }
}
}

?>

                                           "data": [<?php echo $vacacion;?>,<?php echo $permiso;?>, <?php echo $comision;?>],

                                            "backgroundColor": [ "rgb(0, 162, 235)", "rgb(255, 0, 86)", "rgb(50, 20, 0)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>


            </div>
        </div>
    </div>

    <script>
        /Toggle dropdown list/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /Filter dropdown options/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>

        </div>
        <div id="div2"  style="display:none">
            <h1 class="text-red-500 text-center"> <p class="text-4xl ">REPORTE: GERENCIA RECURSOS HUMANOS</p> </h1>
        <div class="main-content bg-gray-800 mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="flex flex-row flex-wrap flex-grow mt-2">

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class=" text-center font-bold uppercase text-gray-600"> TODAS LAS SOLICITUDES REALIZADAS</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-51" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-51"), {
                                    "type": "bar",
                                    "data": {
<?php

    $primermes2= $primermes;
    $segundomes2= $segundomes;
    $tercermes2= $tercermes;
    $cuartomes2= $cuartomes;

    if($cuartomes==1||$cuartomes==2||$cuartomes==3){
        $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
        FROM solicitud as s, usuario as u
        where MONTH(s.fecha_solicitud)=$primermes2 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='2'
        group by s.id_tiposolicitud";
    }else{
        $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
        FROM solicitud as s, usuario as u
        where MONTH(s.fecha_solicitud)=$primermes2 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='2'
        group by s.id_tiposolicitud";
    }


    $resultado1 = mysqli_query($coneccion, $codigo1);
    $primermesotras2=0;
    $primermesboleta2=0;
    $primermescer2=0;
    $primermesexcep2=0;
    $primermesmed2=0;
    while ($rest1 = mysqli_fetch_array($resultado1)) {

        if($rest1['id_tiposolicitud']=='1'){
          $primermesexcep2=$rest1['suma'];
        }else{
          if($rest1['id_tiposolicitud']=='2'){

            $primermesboleta2=$rest1['suma'];

          }else{
            if($rest1['id_tiposolicitud']=='3'){
              $primermescer2=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='4'){
             $primermesmed2=$rest1['suma'];
              }
            }
          }

          }

        }
        $primermesotras2=$primermesexcep2+$primermesboleta2+$primermescer2+$primermesmed2;

        if($cuartomes==1||$cuartomes==2){
            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$segundomes2 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='2'
            group by s.id_tiposolicitud";
        }else{
            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$segundomes2 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='2'
            group by s.id_tiposolicitud";
        }

        $resultado1 = mysqli_query($coneccion, $codigo1);
        $segundomesotras2=0;
        $segundomesboleta2=0;
        $segundomescer2=0;
        $segundomesexcep2=0;
        $segundomesmed2=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $segundomesexcep2=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $segundomesboleta2=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $segundomescer2=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $segundomesmed2=$rest1['suma'];
                  }
                }
              }

              }

            }
            $segundomesotras2=$segundomesexcep2+$segundomesboleta2+$segundomescer2+$segundomesmed2;

            if($cuartomes==1){
                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                FROM solicitud as s, usuario as u
                where MONTH(s.fecha_solicitud)=$tercermes2 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='2'
                group by s.id_tiposolicitud";
            }else{
                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                FROM solicitud as s, usuario as u
                where MONTH(s.fecha_solicitud)=$tercermes2 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='2'
                group by s.id_tiposolicitud";
            }

        $resultado1 = mysqli_query($coneccion, $codigo1);
        $tercermesotras2=0;
        $tercermesboleta2=0;
        $tercermescer2=0;
        $tercermesexcep2=0;
        $tercermesmed2=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $tercermesexcep2=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $tercermesboleta2=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $tercermescer2=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $tercermesmed2=$rest1['suma'];
                  }
                }
              }

              }

            }
            $tercermesotras2=$tercermesexcep2+$tercermesboleta2+$tercermescer2+$tercermesmed2;
            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$cuartomes2 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='2'
            group by s.id_tiposolicitud";
        $resultado1 = mysqli_query($coneccion, $codigo1);
        $cuartomesotras2=0;
        $cuartomesboleta2=0;
        $cuartomescer2=0;
        $cuartomesexcep2=0;
        $cuartomesmed2=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $cuartomesexcep2=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $cuartomesboleta2=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $cuartomescer2=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $cuartomesmed2=$rest1['suma'];
                  }
                }
              }

              }

            }
            $cuartomesotras2=$cuartomesexcep2+$cuartomesboleta2+$cuartomescer2+$cuartomesmed2;
    ?>


                                        "labels": ["<?php echo  $meses[$primermes2];?>", "<?php echo $meses[$segundomes2];?>", "<?php echo $meses[$tercermes2];?>", "<?php echo $meses[$cuartomes2];?>"],
                                        "datasets": [{
                                            "label": "TODAS",
                                            "data": [<?php echo  $primermesotras2;?>, <?php echo  $segundomesotras2;?>, <?php echo  $tercermesotras2;?>, <?php echo  $cuartomesotras2;?>],
                                            "borderColor": "rgb(255, 99, 132)",
                                            "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                        }, {
                                            "label": "EXCEPCIONES",
                                            "data": [<?php echo  $primermesexcep2;?>, <?php echo  $segundomesexcep2;?>, <?php echo  $tercermesexcep2;?>, <?php echo  $cuartomesexcep2;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 162, 235)"
                                        },{
                                            "label": "BOLETAS",
                                            "data": [<?php echo  $primermesboleta2;?>, <?php echo  $segundomesboleta2;?>, <?php echo  $tercermesboleta2;?>, <?php echo  $cuartomesboleta2;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(240, 0, 0)"
                                        }
                                        ,{
                                            "label": "CERTIFICADOS",
                                            "data": [<?php echo  $primermescer2;?>, <?php echo  $segundomescer2;?>, <?php echo  $tercermescer2;?>, <?php echo  $cuartomescer2;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(0, 0,200)"
                                        }
                                        ,{
                                            "label": "BAJAS",
                                            "data": [<?php echo  $primermesmed2;?>, <?php echo  $segundomesmed2;?>, <?php echo  $tercermesmed2;?>, <?php echo  $cuartomesmed2;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 255, 235)"
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>




                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES ANUALES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-52" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-52"), {
                                    <?php
                                         $primeranio2= date('Y')-3;
                                         $segundoanio2= date('Y')-2;
                                         $terceranio2= date('Y')-1;
                                         $cuartoanio2= date('Y');

$codigo10 = "SELECT year(s.fecha_solicitud) as year ,COUNT(*) as valor FROM solicitud as s,usuario as u
WHERE s.id_usuario=u.id and u.id_gerencia='2'
group by year(s.fecha_solicitud)";
$resultado10 = mysqli_query($coneccion, $codigo10);
$primeraniosol2=0;
$segundoaniosol2=0;
$terceraniosol2=0;
$cuartoaniosol2=0;
while ($rest10 = mysqli_fetch_array($resultado10)) {


if($rest10['year']==$primeranio2){
    $primeraniosol2=$rest10['valor'];
}else{
    if($rest10['year']==$segundoanio2){
        $segundoaniosol2=$rest10['valor'];
    }else{
        if($rest10['year']==$terceranio2){
            $terceraniosol2=$rest10['valor'];

        }else{
            if($rest10['year']==$cuartoanio2){
                $cuartoaniosol2=$rest10['valor'];
            }
        }
    }
}
}


                                        ?>
                                    "type": "line",
                                    "data": {
                                        "labels": ["<?php echo  $primeranio2 ;?>", "<?php echo $segundoanio2 ;?>", "<?php echo $terceranio2 ;?>", "<?php echo $cuartoanio2 ;?>"],
                                        "datasets": [{
                                            "label": "SOLICITUDES",
                                            "data": [<?php echo  $primeraniosol2 ;?>, <?php echo $segundoaniosol2 ;?>, <?php echo $terceraniosol2 ;?>, <?php echo $cuartoaniosol2 ;?>],
                                            "fill": false,
                                            "borderColor": "rgb(75, 192, 192)",
                                            "lineTension": 0.1
                                        }]
                                    },
                                    "options": {}
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>
                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                     <!--Graph Card-->
                     <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES DEL ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-53" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-53"), {
                                    "type": "bar",
                                    "data": {
<?php

if($cuartomes==1){
    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
    FROM solicitud as s,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='2'
    group by s.id_tiposolicitud ";
}else{
    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
    FROM solicitud as s,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='2'
    group by s.id_tiposolicitud ";
}

$resultado9 = mysqli_query($coneccion, $codigo9);
$excepcionesmes=0;
$boletames=0;
$certificadomes=0;
$medicomes=0;

while ($rest9 = mysqli_fetch_array($resultado9)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];
if($rest9['id_tiposolicitud']=='1'){
    $excepcionesmes=$rest9['valor'];
}else{
    if($rest9['id_tiposolicitud']=='2'){
        $boletames=$rest9['valor'];
    }else{
        if($rest9['id_tiposolicitud']=='3'){
            $certificadomes=$rest9['valor'];

        }else{
            if($rest9['id_tiposolicitud']=='4'){
                $medicomes=$rest9['valor'];
            }
        }
    }
}
}

    ?>


                                        "labels": ["EXCEPCIONES", "CERTIFICADOS", "BOLETAS", "BAJAS MEDICAS"],
                                        "datasets": [{
                                            "label": " <?php  echo $meses[$tercermes2];?>",
                                            "data": [<?php  echo $excepcionesmes;?>, <?php  echo $certificadomes;?>, <?php  echo $boletames;?>, <?php  echo $medicomes;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">EXCEPCIONES ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-54" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-54"), {
                                    "type": "bar",
                                    "data": {


                                        <?php
if($cuartomes==1){
    $codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor

    FROM solicitud as s ,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes2 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='2'
    group by s.id_tipoexcepcion";
}else{
    $codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor

    FROM solicitud as s ,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes2 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='2'
    group by s.id_tipoexcepcion";
}

$resultado9 = mysqli_query($coneccion, $codigo9);
$permisomes2=0;
$vacacionesmes2=0;
$comisionmes2=0;
while ($rest9 = mysqli_fetch_array($resultado9)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];
if($rest9['id_tipoexcepcion']=='1'){
    $permisomes2=$rest9['valor'];
}else{
    if($rest9['id_tipoexcepcion']=='2'){
        $vacacionesmes2=$rest9['valor'];
    }else{
        if($rest9['id_tipoexcepcion']=='3'){
            $comisionmes2=$rest9['valor'];

        }else{
            }
        }
    }

}

    ?>
                                        "labels": ["VACACIONES", "COMISIONES", "PERMISOS"],
                                        "datasets": [{
                                            "label": "<?php  echo $meses[$tercermes2];?>",
                                            "data": [<?php  echo $vacacionesmes2;?>, <?php  echo $comisionmes2;?>, <?php  echo $permisomes2;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes realizadas</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-55" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-55"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["Excepciones", "Boleta de pago", "Certificado", "Baja Medica"],
                                        "datasets": [{
                                            "label": "Issues",

<?php
$anioactual=date("Y");
$codigo = "SELECT s.id_tiposolicitud, COUNT(*) as valor
FROM solicitud as s , usuario as u
where year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='2'
group by s.id_tiposolicitud
";
$resultado = mysqli_query($coneccion, $codigo);
$excepciones2=0;
$boleta2=0;
$certificado2=0;
$medico2=0;
while ($rest = mysqli_fetch_array($resultado)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];
if($rest['id_tiposolicitud']=='1'){
    $excepciones2=$rest['valor'];
}else{
    if($rest['id_tiposolicitud']=='2'){
        $boleta2=$rest['valor'];
    }else{
        if($rest['id_tiposolicitud']=='3'){
            $certificado2=$rest['valor'];

        }else{
            if($rest['id_tiposolicitud']=='4'){
                $medico2=$rest['valor'];
            }
        }
    }
}
}

?>

                                           "data": [<?php echo $excepciones2;?>,<?php echo $boleta2;?>, <?php echo $certificado2;?>, <?php echo $medico2;?>],

                                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)", "rgb(50, 20, 86)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes  de tipo excepcion realizadas en el año</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-56" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-56"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["VACACION", "PERMISO", "COMISION"],
                                        "datasets": [{
                                            "label": "Issues",

<?php
$anioactual=date("Y");
$codigo = "SELECT s.id_tipoexcepcion, COUNT(*) as valor FROM solicitud as s , usuario as u
WHERE year(s.fecha_solicitud)='$anioactual' and s.id_usuario=u.id and u.id_gerencia='2'
group by s.id_tipoexcepcion";
$resultado = mysqli_query($coneccion, $codigo);
$permiso2=0;
$vacacion2=0;
$comision2=0;
while ($rest = mysqli_fetch_array($resultado)) {

if($rest['id_tipoexcepcion']=='1'){
    $permiso2=$rest['valor'];
}else{
    if($rest['id_tipoexcepcion']=='2'){
        $vacacion2=$rest['valor'];
    }else{
        if($rest['id_tipoexcepcion']=='3'){
            $comision2=$rest['valor'];

        }else{

        }
    }
}
}

?>

                                           "data": [<?php echo $vacacion2;?>,<?php echo $permiso2;?>, <?php echo $comision2;?>],

                                            "backgroundColor": [ "rgb(0, 162, 235)", "rgb(255, 0, 86)", "rgb(50, 20, 0)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>


            </div>
        </div>
    </div>

    <script>
        /Toggle dropdown list/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /Filter dropdown options/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>



         </div>
          <div id="div3"  style="display:none">
            <h1 class="text-red-500 text-center"> <p class="text-4xl ">REPORTE: GERENCIA TERCERA</p> </h1>

          <?php
 $coneccion = mysqli_connect ("localhost", "root", "" );
 $basededatos = 'cotel';
 $bd =mysqli_select_db ($coneccion, $basededatos);
 $anioactual=date("Y");

             ?>


        <div class="main-content bg-gray-800 mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="flex flex-row flex-wrap flex-grow mt-2">

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class=" text-center font-bold uppercase text-gray-600"> TODAS LAS SOLICITUDES REALIZADAS</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-57" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-57"), {
                                    "type": "bar",
                                    "data": {
<?php

    $primermes3= $primermes;
    $segundomes3= $segundomes;
    $tercermes3= $tercermes;
    $cuartomes3=$cuartomes;
    if($cuartomes ==1||$cuartomes==2|| $cuartomes==3){

        $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
        FROM solicitud as s, usuario as u
        where MONTH(s.fecha_solicitud)=$primermes3 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='3'
        group by s.id_tiposolicitud";
    }else{

        $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
        FROM solicitud as s, usuario as u
        where MONTH(s.fecha_solicitud)=$primermes3 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='3'
        group by s.id_tiposolicitud";
    }

    $resultado1 = mysqli_query($coneccion, $codigo1);
    $primermesotras3=0;
    $primermesboleta3=0;
    $primermescer3=0;
    $primermesexcep3=0;
    $primermesmed3=0;
    while ($rest1 = mysqli_fetch_array($resultado1)) {

        if($rest1['id_tiposolicitud']=='1'){
          $primermesexcep3=$rest1['suma'];
        }else{
          if($rest1['id_tiposolicitud']=='2'){

            $primermesboleta3=$rest1['suma'];

          }else{
            if($rest1['id_tiposolicitud']=='3'){
              $primermescer3=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='4'){
             $primermesmed3=$rest1['suma'];
              }
            }
          }

          }

        }
        $primermesotras3=$primermesexcep3+$primermesboleta3+$primermescer3+$primermesmed3;

        if($cuartomes==1||$cuartomes==2){
            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$segundomes3 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='3'
            group by s.id_tiposolicitud";
        }else{
            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$segundomes3 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='3'
            group by s.id_tiposolicitud";
        }

        $resultado1 = mysqli_query($coneccion, $codigo1);
        $segundomesotras3=0;
        $segundomesboleta3=0;
        $segundomescer3=0;
        $segundomesexcep3=0;
        $segundomesmed3=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $segundomesexcep3=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $segundomesboleta3=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $segundomescer3=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $segundomesmed3=$rest1['suma'];
                  }
                }
              }

              }

            }
            $segundomesotras3=$segundomesexcep3+$segundomesboleta3+$segundomescer3+$segundomesmed3;

            if($cuartomes==1){
                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                FROM solicitud as s, usuario as u
                where MONTH(s.fecha_solicitud)=$tercermes3 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='3'
                group by s.id_tiposolicitud";
            }else{
                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                FROM solicitud as s, usuario as u
                where MONTH(s.fecha_solicitud)=$tercermes3 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='3'
                group by s.id_tiposolicitud";
            }

        $resultado1 = mysqli_query($coneccion, $codigo1);
        $tercermesotras3=0;
        $tercermesboleta3=0;
        $tercermescer3=0;
        $tercermesexcep3=0;
        $tercermesmed3=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $tercermesexcep3=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $tercermesboleta3=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $tercermescer3=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $tercermesmed3=$rest1['suma'];
                  }
                }
              }

              }

            }
            $tercermesotras3=$tercermesexcep3+$tercermesboleta3+$tercermescer3+$tercermesmed3;

            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$cuartomes3 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='3'
            group by s.id_tiposolicitud";
        $resultado1 = mysqli_query($coneccion, $codigo1);
        $cuartomesotras3=0;
        $cuartomesboleta3=0;
        $cuartomescer3=0;
        $cuartomesexcep3=0;
        $cuartomesmed3=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $cuartomesexcep3=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $cuartomesboleta3=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $cuartomescer3=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $cuartomesmed3=$rest1['suma'];
                  }
                }
              }

              }

            }
            $cuartomesotras3=$cuartomesexcep3+$cuartomesboleta3+$cuartomescer3+$cuartomesmed3;
    ?>


                                        "labels": ["<?php echo  $meses[$primermes3];?>", "<?php echo $meses[$segundomes3];?>", "<?php echo $meses[$tercermes3];?>", "<?php echo $meses[$cuartomes3];?>"],
                                        "datasets": [{
                                            "label": "TODAS",
                                            "data": [<?php echo  $primermesotras3;?>, <?php echo  $segundomesotras3;?>, <?php echo  $tercermesotras3;?>, <?php echo  $cuartomesotras3;?>],
                                            "borderColor": "rgb(255, 99, 132)",
                                            "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                        }, {
                                            "label": "EXCEPCIONES",
                                            "data": [<?php echo  $primermesexcep3;?>, <?php echo  $segundomesexcep3;?>, <?php echo  $tercermesexcep3;?>, <?php echo  $cuartomesexcep3;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 162, 235)"
                                        },{
                                            "label": "BOLETAS",
                                            "data": [<?php echo  $primermesboleta3;?>, <?php echo  $segundomesboleta3;?>, <?php echo  $tercermesboleta3;?>, <?php echo  $cuartomesboleta3;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(240, 0, 0)"
                                        }
                                        ,{
                                            "label": "CERTIFICADOS",
                                            "data": [<?php echo  $primermescer3;?>, <?php echo  $segundomescer3;?>, <?php echo  $tercermescer3;?>, <?php echo  $cuartomescer3;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(0, 0,200)"
                                        }
                                        ,{
                                            "label": "BAJAS",
                                            "data": [<?php echo  $primermesmed3;?>, <?php echo  $segundomesmed3;?>, <?php echo  $tercermesmed3;?>, <?php echo  $cuartomesmed3;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 255, 235)"
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>




                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES ANUALES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-58" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-58"), {
                                    <?php
                                         $primeranio3= date('Y')-3;
                                         $segundoanio3= date('Y')-2;
                                         $terceranio3= date('Y')-1;
                                         $cuartoanio3= date('Y');

$codigo10 = "SELECT year(s.fecha_solicitud) as year ,COUNT(*) as valor FROM solicitud as s,usuario as u
WHERE s.id_usuario=u.id and u.id_gerencia='3'
group by year(s.fecha_solicitud)";
$resultado10 = mysqli_query($coneccion, $codigo10);
$primeraniosol3=0;
$segundoaniosol3=0;
$terceraniosol3=0;
$cuartoaniosol3=0;
while ($rest10 = mysqli_fetch_array($resultado10)) {


if($rest10['year']==$primeranio3){
    $primeraniosol3=$rest10['valor'];
}else{
    if($rest10['year']==$segundoanio3){
        $segundoaniosol3=$rest10['valor'];
    }else{
        if($rest10['year']==$terceranio3){
            $terceraniosol3=$rest10['valor'];

        }else{
            if($rest10['year']==$cuartoanio){
                $cuartoaniosol3=$rest10['valor'];
            }
        }
    }
}
}


                                        ?>
                                    "type": "line",
                                    "data": {
                                        "labels": ["<?php echo  $primeranio3 ;?>", "<?php echo $segundoanio3 ;?>", "<?php echo $terceranio3 ;?>", "<?php echo $cuartoanio3 ;?>"],
                                        "datasets": [{
                                            "label": "SOLICITUDES",
                                            "data": [<?php echo  $primeraniosol3 ;?>, <?php echo $segundoaniosol3 ;?>, <?php echo $terceraniosol3 ;?>, <?php echo $cuartoaniosol3 ;?>],
                                            "fill": false,
                                            "borderColor": "rgb(75, 192, 192)",
                                            "lineTension": 0.1
                                        }]
                                    },
                                    "options": {}
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>
                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                     <!--Graph Card-->
                     <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES DEL ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-59" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-59"), {
                                    "type": "bar",
                                    "data": {
<?php
if($cuartomes==1){
    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
    FROM solicitud as s,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='3'
    group by s.id_tiposolicitud ";
}else{
    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
    FROM solicitud as s,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='3'
    group by s.id_tiposolicitud ";
}

$resultado9 = mysqli_query($coneccion, $codigo9);
$excepcionesmes3=0;
$boletames3=0;
$certificadomes3=0;
$medicomes3=0;

while ($rest9 = mysqli_fetch_array($resultado9)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];
if($rest9['id_tiposolicitud']=='1'){
    $excepcionesmes3=$rest9['valor'];
}else{
    if($rest9['id_tiposolicitud']=='2'){
        $boletames3=$rest9['valor'];
    }else{
        if($rest9['id_tiposolicitud']=='3'){
            $certificadomes3=$rest9['valor'];

        }else{
            if($rest9['id_tiposolicitud']=='4'){
                $medicomes3=$rest9['valor'];
            }
        }
    }
}
}

    ?>


                                        "labels": ["EXCEPCIONES", "CERTIFICADOS", "BOLETAS", "BAJAS MEDICAS"],
                                        "datasets": [{
                                            "label": " <?php  echo $meses[$tercermes3];?>",
                                            "data": [<?php  echo $excepcionesmes3;?>, <?php  echo $certificadomes3;?>, <?php  echo $boletames3;?>, <?php  echo $medicomes3;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">EXCEPCIONES ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-60" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-60"), {
                                    "type": "bar",
                                    "data": {


                                        <?php
if($cuartomes==1){
    $codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor
    FROM solicitud as s ,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes3 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='3'
    group by s.id_tipoexcepcion";
}else{
    $codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor
    FROM solicitud as s ,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes3 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='3'
    group by s.id_tipoexcepcion";
}

$resultado9 = mysqli_query($coneccion, $codigo9);
$permisomes3=0;
$vacacionesmes3=0;
$comisionmes3=0;
while ($rest9 = mysqli_fetch_array($resultado9)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];
if($rest9['id_tipoexcepcion']=='1'){
    $permisomes3=$rest9['valor'];
}else{
    if($rest9['id_tipoexcepcion']=='2'){
        $vacacionesmes3=$rest9['valor'];
    }else{
        if($rest9['id_tipoexcepcion']=='3'){
            $comisionmes3=$rest9['valor'];

        }else{
            }
        }
    }

}

    ?>
                                        "labels": ["VACACIONES", "COMISIONES", "PERMISOS"],
                                        "datasets": [{
                                            "label": "<?php  echo $meses[$tercermes3];?>",
                                            "data": [<?php  echo $vacacionesmes3;?>, <?php  echo $comisionmes3;?>, <?php  echo $permisomes3;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes realizadas</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-152" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-152"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["Excepciones", "Boleta de pago", "Certificado", "Baja Medica"],
                                        "datasets": [{
                                            "label": "Issues",

<?php
$anioactual=date("Y");
$codigo = "SELECT s.id_tiposolicitud, COUNT(*) as valor
FROM solicitud as s , usuario as u
where year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='3'
group by s.id_tiposolicitud
";
$resultado = mysqli_query($coneccion, $codigo);
$excepciones3=0;
$boleta3=0;
$certificado3=0;
$medico3=0;
while ($rest = mysqli_fetch_array($resultado)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];
if($rest['id_tiposolicitud']=='1'){
    $excepciones3=$rest['valor'];
}else{
    if($rest['id_tiposolicitud']=='2'){
        $boleta3=$rest['valor'];
    }else{
        if($rest['id_tiposolicitud']=='3'){
            $certificado3=$rest['valor'];

        }else{
            if($rest['id_tiposolicitud']=='4'){
                $medico3=$rest['valor'];
            }
        }
    }
}
}

?>

                                           "data": [<?php echo $excepciones3;?>,<?php echo $boleta3;?>, <?php echo $certificado3;?>, <?php echo $medico3;?>],

                                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)", "rgb(50, 20, 86)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes  de tipo excepcion realizadas en el año</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-61" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-61"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["VACACION", "PERMISO", "COMISION"],
                                        "datasets": [{
                                            "label": "Issues",

<?php
$anioactual=date("Y");
$codigo = "SELECT s.id_tipoexcepcion, COUNT(*) as valor FROM solicitud as s , usuario as u
WHERE year(s.fecha_solicitud)='$anioactual' and s.id_usuario=u.id and u.id_gerencia='3'
group by s.id_tipoexcepcion";
$resultado = mysqli_query($coneccion, $codigo);
$permiso3=0;
$vacacion3=0;
$comision3=0;
while ($rest = mysqli_fetch_array($resultado)) {

if($rest['id_tipoexcepcion']=='1'){
    $permiso3=$rest['valor'];
}else{
    if($rest['id_tipoexcepcion']=='2'){
        $vacacion3=$rest['valor'];
    }else{
        if($rest['id_tipoexcepcion']=='3'){
            $comision3=$rest['valor'];

        }else{

        }
    }
}
}

?>

                                           "data": [<?php echo $vacacion3;?>,<?php echo $permiso3;?>, <?php echo $comision3;?>],

                                            "backgroundColor": [ "rgb(0, 162, 235)", "rgb(255, 0, 86)", "rgb(50, 20, 0)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>


            </div>
        </div>
    </div>

    <script>
        /Toggle dropdown list/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /Filter dropdown options/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>



          </div>
          <div id="div4"  style="display:none">
          <h1>GERENCIA ...</h1>
          <?php
 $coneccion = mysqli_connect ("localhost", "root", "" );
 $basededatos = 'cotel';
 $bd =mysqli_select_db ($coneccion, $basededatos);
 $anioactual=date("Y");

             ?>


        <div class="main-content bg-gray-800 mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="flex flex-row flex-wrap flex-grow mt-2">

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class=" text-center font-bold uppercase text-gray-600"> TODAS LAS SOLICITUDES REALIZADAS</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-62" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-62"), {
                                    "type": "bar",
                                    "data": {
<?php
$meses = array(" ","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $primermes4= $primermes;
    $segundomes4= $segundomes;
    $tercermes4= $tercermes;
    $cuartomes4= $cuartomes;

    if($cuartomes==1||$cuartomes==2||$cuartomes==3){
        $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
    FROM solicitud as s, usuario as u
    where MONTH(s.fecha_solicitud)=$primermes4 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='4'
    group by s.id_tiposolicitud";
    }else{
        $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
    FROM solicitud as s, usuario as u
    where MONTH(s.fecha_solicitud)=$primermes4 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='4'
    group by s.id_tiposolicitud";
    }

    $resultado1 = mysqli_query($coneccion, $codigo1);
    $primermesotras4=0;
    $primermesboleta4=0;
    $primermescer4=0;
    $primermesexcep4=0;
    $primermesmed4=0;
    while ($rest1 = mysqli_fetch_array($resultado1)) {

        if($rest1['id_tiposolicitud']=='1'){
          $primermesexcep4=$rest1['suma'];
        }else{
          if($rest1['id_tiposolicitud']=='2'){

            $primermesboleta4=$rest1['suma'];

          }else{
            if($rest1['id_tiposolicitud']=='3'){
              $primermescer4=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='4'){
             $primermesmed4=$rest1['suma'];
              }
            }
          }

          }

        }
        $primermesotras4=$primermesexcep4+$primermesboleta4+$primermescer4+$primermesmed4;
        if($cuartomes==1||$cuartomes==2){
            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$segundomes4 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='4'
            group by s.id_tiposolicitud";
        }else{
            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$segundomes4 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='4'
            group by s.id_tiposolicitud";

        }


        $resultado1 = mysqli_query($coneccion, $codigo1);
        $segundomesotras4=0;
        $segundomesboleta4=0;
        $segundomescer4=0;
        $segundomesexcep4=0;
        $segundomesmed4=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $segundomesexcep4=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $segundomesboleta4=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $segundomescer4=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $segundomesmed4=$rest1['suma'];
                  }
                }
              }

              }

            }
            $segundomesotras4=$segundomesexcep4+$segundomesboleta4+$segundomescer4+$segundomesmed4;

            if($cuartomes==1){
                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                FROM solicitud as s, usuario as u
                where MONTH(s.fecha_solicitud)=$tercermes4 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='4'
                group by s.id_tiposolicitud";
            }else{
                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                FROM solicitud as s, usuario as u
                where MONTH(s.fecha_solicitud)=$tercermes4 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='4'
                group by s.id_tiposolicitud";
            }

        $resultado1 = mysqli_query($coneccion, $codigo1);
        $tercermesotras4=0;
        $tercermesboleta4=0;
        $tercermescer4=0;
        $tercermesexcep4=0;
        $tercermesmed4=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $tercermesexcep4=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $tercermesboleta4=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $tercermescer4=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $tercermesmed4=$rest1['suma'];
                  }
                }
              }

              }

            }
            $tercermesotras4=$tercermesexcep4+$tercermesboleta4+$tercermescer4+$tercermesmed4;
            $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
            FROM solicitud as s, usuario as u
            where MONTH(s.fecha_solicitud)=$cuartomes4 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='4'
            group by s.id_tiposolicitud";
        $resultado1 = mysqli_query($coneccion, $codigo1);
        $cuartomesotras4=0;
        $cuartomesboleta4=0;
        $cuartomescer4=0;
        $cuartomesexcep4=0;
        $cuartomesmed4=0;
        while ($rest1 = mysqli_fetch_array($resultado1)) {

            if($rest1['id_tiposolicitud']=='1'){
              $cuartomesexcep4=$rest1['suma'];
            }else{
              if($rest1['id_tiposolicitud']=='2'){

                $cuartomesboleta4=$rest1['suma'];

              }else{
                if($rest1['id_tiposolicitud']=='3'){
                  $cuartomescer4=$rest1['suma'];
                }else{
                  if($rest1['id_tiposolicitud']=='4'){
                 $cuartomesmed4=$rest1['suma'];
                  }
                }
              }

              }

            }
            $cuartomesotras4=$cuartomesexcep4+$cuartomesboleta4+$cuartomescer4+$cuartomesmed4;
    ?>


                                        "labels": ["<?php echo  $meses[$primermes4];?>", "<?php echo $meses[$segundomes4];?>", "<?php echo $meses[$tercermes4];?>", "<?php echo $meses[$cuartomes4];?>"],
                                        "datasets": [{
                                            "label": "TODAS",
                                            "data": [<?php echo  $primermesotras4;?>, <?php echo  $segundomesotras4;?>, <?php echo  $tercermesotras4;?>, <?php echo  $cuartomesotras4;?>],
                                            "borderColor": "rgb(255, 99, 132)",
                                            "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                        }, {
                                            "label": "EXCEPCIONES",
                                            "data": [<?php echo  $primermesexcep4;?>, <?php echo  $segundomesexcep4;?>, <?php echo  $tercermesexcep4;?>, <?php echo  $cuartomesexcep4;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 162, 235)"
                                        },{
                                            "label": "BOLETAS",
                                            "data": [<?php echo  $primermesboleta4;?>, <?php echo  $segundomesboleta4;?>, <?php echo  $tercermesboleta4;?>, <?php echo  $cuartomesboleta4;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(240, 0, 0)"
                                        }
                                        ,{
                                            "label": "CERTIFICADOS",
                                            "data": [<?php echo  $primermescer4;?>, <?php echo  $segundomescer4;?>, <?php echo  $tercermescer4;?>, <?php echo  $cuartomescer4;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(0, 0,200)"
                                        }
                                        ,{
                                            "label": "BAJAS",
                                            "data": [<?php echo  $primermesmed4;?>, <?php echo  $segundomesmed4;?>, <?php echo  $tercermesmed4;?>, <?php echo  $cuartomesmed4;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 255, 235)"
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>




                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES ANUALES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-63" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-63"), {
                                    <?php
                                         $primeranio4= date('Y')-3;
                                         $segundoanio4= date('Y')-2;
                                         $terceranio4= date('Y')-1;
                                         $cuartoanio4= date('Y');

$codigo10 = "SELECT year(s.fecha_solicitud) as year ,COUNT(*) as valor FROM solicitud as s,usuario as u
WHERE s.id_usuario=u.id and u.id_gerencia='4'
group by year(s.fecha_solicitud)";
$resultado10 = mysqli_query($coneccion, $codigo10);
$primeraniosol4=0;
$segundoaniosol4=0;
$terceraniosol4=0;
$cuartoaniosol4=0;
while ($rest10 = mysqli_fetch_array($resultado10)) {


if($rest10['year']==$primeranio4){
    $primeraniosol4=$rest10['valor'];
}else{
    if($rest10['year']==$segundoanio4){
        $segundoaniosol4=$rest10['valor'];
    }else{
        if($rest10['year']==$terceranio4){
            $terceraniosol4=$rest10['valor'];

        }else{
            if($rest10['year']==$cuartoanio4){
                $cuartoaniosol4=$rest10['valor'];
            }
        }
    }
}
}


                                        ?>
                                    "type": "line",
                                    "data": {
                                        "labels": ["<?php echo  $primeranio4 ;?>", "<?php echo $segundoanio4 ;?>", "<?php echo $terceranio4 ;?>", "<?php echo $cuartoanio4 ;?>"],
                                        "datasets": [{
                                            "label": "SOLICITUDES",
                                            "data": [<?php echo  $primeraniosol4 ;?>, <?php echo $segundoaniosol4 ;?>, <?php echo $terceraniosol4 ;?>, <?php echo $cuartoaniosol4 ;?>],
                                            "fill": false,
                                            "borderColor": "rgb(75, 192, 192)",
                                            "lineTension": 0.1
                                        }]
                                    },
                                    "options": {}
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>
                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                     <!--Graph Card-->
                     <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES DEL ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-10" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-10"), {
                                    "type": "bar",
                                    "data": {
<?php
if($cuartomes==1){
    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
FROM solicitud as s,usuario as u
where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='4'
group by s.id_tiposolicitud ";

}else{
    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
    FROM solicitud as s,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='4'
    group by s.id_tiposolicitud ";
}

$resultado9 = mysqli_query($coneccion, $codigo9);
$excepcionesmes4=0;
$boletames4=0;
$certificadomes4=0;
$medicomes4=0;

while ($rest9 = mysqli_fetch_array($resultado9)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];
if($rest9['id_tiposolicitud']=='1'){
    $excepcionesmes4=$rest9['valor'];
}else{
    if($rest9['id_tiposolicitud']=='2'){
        $boletames4=$rest9['valor'];
    }else{
        if($rest9['id_tiposolicitud']=='3'){
            $certificadomes4=$rest9['valor'];

        }else{
            if($rest9['id_tiposolicitud']=='4'){
                $medicomes4=$rest9['valor'];
            }
        }
    }
}
}

    ?>


                                        "labels": ["EXCEPCIONES", "CERTIFICADOS", "BOLETAS", "BAJAS MEDICAS"],
                                        "datasets": [{
                                            "label": " <?php  echo $meses[$tercermes4];?>",
                                            "data": [<?php  echo $excepcionesmes4;?>, <?php  echo $certificadomes4;?>, <?php  echo $boletames4;?>, <?php  echo $medicomes4;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">EXCEPCIONES ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-64" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-64"), {
                                    "type": "bar",
                                    "data": {


                                        <?php
if($cuartomes==1){

$codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor
FROM solicitud as s ,usuario as u
where MONTH(s.fecha_solicitud)=$tercermes4 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='4'
group by s.id_tipoexcepcion";
}else{

$codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor
FROM solicitud as s ,usuario as u
where MONTH(s.fecha_solicitud)=$tercermes4 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='4'
group by s.id_tipoexcepcion";
}
$resultado9 = mysqli_query($coneccion, $codigo9);
$permisomes4=0;
$vacacionesmes4=0;
$comisionmes4=0;
while ($rest9 = mysqli_fetch_array($resultado9)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];
if($rest9['id_tipoexcepcion']=='1'){
    $permisomes4=$rest9['valor'];
}else{
    if($rest9['id_tipoexcepcion']=='2'){
        $vacacionesmes4=$rest9['valor'];
    }else{
        if($rest9['id_tipoexcepcion']=='3'){
            $comisionmes4=$rest9['valor'];

        }else{
            }
        }
    }

}

    ?>
                                        "labels": ["VACACIONES", "COMISIONES", "PERMISOS"],
                                        "datasets": [{
                                            "label": "<?php  echo $meses[$tercermes4];?>",
                                            "data": [<?php  echo $vacacionesmes4;?>, <?php  echo $comisionmes4;?>, <?php  echo $permisomes4;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes realizadas</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-65" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-65"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["Excepciones", "Boleta de pago", "Certificado", "Baja Medica"],
                                        "datasets": [{
                                            "label": "Issues",

<?php
$anioactual=date("Y");
$codigo = "SELECT s.id_tiposolicitud, COUNT(*) as valor
FROM solicitud as s , usuario as u
where year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='4'
group by s.id_tiposolicitud
";
$resultado = mysqli_query($coneccion, $codigo);
$excepciones4=0;
$boleta4=0;
$certificado4=0;
$medico4=0;
while ($rest = mysqli_fetch_array($resultado)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];
if($rest['id_tiposolicitud']=='1'){
    $excepciones4=$rest['valor'];
}else{
    if($rest['id_tiposolicitud']=='2'){
        $boleta4=$rest['valor'];
    }else{
        if($rest['id_tiposolicitud']=='3'){
            $certificado4=$rest['valor'];

        }else{
            if($rest['id_tiposolicitud']=='4'){
                $medico4=$rest['valor'];
            }
        }
    }
}
}

?>

                                           "data": [<?php echo $excepciones4;?>,<?php echo $boleta4;?>, <?php echo $certificado4;?>, <?php echo $medico4;?>],

                                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)", "rgb(50, 20, 86)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes  de tipo excepcion realizadas en el año</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-66" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-66"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["VACACION", "PERMISO", "COMISION"],
                                        "datasets": [{
                                            "label": "Issues",

<?php
$anioactual=date("Y");
$codigo = "SELECT s.id_tipoexcepcion, COUNT(*) as valor FROM solicitud as s , usuario as u
WHERE year(s.fecha_solicitud)='$anioactual' and s.id_usuario=u.id and u.id_gerencia='4'
group by s.id_tipoexcepcion";
$resultado = mysqli_query($coneccion, $codigo);
$permiso4=0;
$vacacion4=0;
$comision4=0;
while ($rest = mysqli_fetch_array($resultado)) {

if($rest['id_tipoexcepcion']=='1'){
    $permiso4=$rest['valor'];
}else{
    if($rest['id_tipoexcepcion']=='2'){
        $vacacion4=$rest['valor'];
    }else{
        if($rest['id_tipoexcepcion']=='3'){
            $comision4=$rest['valor'];

        }else{

        }
    }
}
}

?>

                                           "data": [<?php echo $vacacion4;?>,<?php echo $permiso4;?>, <?php echo $comision4;?>],

                                            "backgroundColor": [ "rgb(0, 162, 235)", "rgb(255, 0, 86)", "rgb(50, 20, 0)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>


            </div>
        </div>
    </div>

    <script>
        /Toggle dropdown list/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /Filter dropdown options/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>

          \


          </div>
<div id="div5"  style="display:none">
          <h1>GERENCIA ...</h1>
        <div class="main-content bg-gray-800 mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="flex flex-row flex-wrap flex-grow mt-2">

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class=" text-center font-bold uppercase text-gray-600"> TODAS LAS SOLICITUDES REALIZADAS</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-67" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-67"), {
                                    "type": "bar",
                                    "data": {
                                    <?php


                                        $primermes5= $primermes;
                                        $segundomes5= $segundomes;
                                        $tercermes5= $tercermes;
                                        $cuartomes5= $cuartomes;
if($cuartomes==1||$cuartomes==2||$cuartomes==3){
    $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                        FROM solicitud as s, usuario as u
                                        where MONTH(s.fecha_solicitud)=$primermes5 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='5'
                                        group by s.id_tiposolicitud";
}else{
    $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                        FROM solicitud as s, usuario as u
                                        where MONTH(s.fecha_solicitud)=$primermes5 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='5'
                                        group by s.id_tiposolicitud";
}

                                        $resultado1 = mysqli_query($coneccion, $codigo1);
                                        $primermesotras5=0;
                                        $primermesboleta5=0;
                                        $primermescer5=0;
                                        $primermesexcep5=0;
                                        $primermesmed5=0;
                                        while ($rest1 = mysqli_fetch_array($resultado1)) {

                                            if($rest1['id_tiposolicitud']=='1'){
                                            $primermesexcep5=$rest1['suma'];
                                            }else{
                                            if($rest1['id_tiposolicitud']=='2'){

                                                $primermesboleta5=$rest1['suma'];

                                            }else{
                                                if($rest1['id_tiposolicitud']=='3'){
                                                $primermescer5=$rest1['suma'];
                                                }else{
                                                if($rest1['id_tiposolicitud']=='4'){
                                                $primermesmed5=$rest1['suma'];
                                                }
                                                }
                                            }

                                            }

                                            }
                                            $primermesotras5=$primermesexcep5+$primermesboleta5+$primermescer5+$primermesmed5;
                                            if($cuartomes==1||$cuartomes==2){
                                                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                FROM solicitud as s, usuario as u
                                                where MONTH(s.fecha_solicitud)=$segundomes5 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='5'
                                                group by s.id_tiposolicitud";
                                            }else{
                                                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                FROM solicitud as s, usuario as u
                                                where MONTH(s.fecha_solicitud)=$segundomes5 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='5'
                                                group by s.id_tiposolicitud";
                                            }

                                            $resultado1 = mysqli_query($coneccion, $codigo1);
                                            $segundomesotras5=0;
                                            $segundomesboleta5=0;
                                            $segundomescer5=0;
                                            $segundomesexcep5=0;
                                            $segundomesmed5=0;
                                            while ($rest1 = mysqli_fetch_array($resultado1)) {

                                                if($rest1['id_tiposolicitud']=='1'){
                                                $segundomesexcep5=$rest1['suma'];
                                                }else{
                                                if($rest1['id_tiposolicitud']=='2'){

                                                    $segundomesboleta5=$rest1['suma'];

                                                }else{
                                                    if($rest1['id_tiposolicitud']=='3'){
                                                    $segundomescer5=$rest1['suma'];
                                                    }else{
                                                    if($rest1['id_tiposolicitud']=='4'){
                                                    $segundomesmed5=$rest1['suma'];
                                                    }
                                                    }
                                                }

                                                }

                                                }
                                                $segundomesotras5=$segundomesexcep5+$segundomesboleta5+$segundomescer5+$segundomesmed5;
                                                if($cuartomes==1){
                                                    $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                    FROM solicitud as s, usuario as u
                                                    where MONTH(s.fecha_solicitud)=$tercermes5 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='5'
                                                    group by s.id_tiposolicitud";
                                                }else{
                                                    $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                    FROM solicitud as s, usuario as u
                                                    where MONTH(s.fecha_solicitud)=$tercermes5 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='5'
                                                    group by s.id_tiposolicitud";
                                                }

                                            $resultado1 = mysqli_query($coneccion, $codigo1);
                                            $tercermesotras5=0;
                                            $tercermesboleta5=0;
                                            $tercermescer5=0;
                                            $tercermesexcep5=0;
                                            $tercermesmed5=0;
                                            while ($rest1 = mysqli_fetch_array($resultado1)) {

                                                if($rest1['id_tiposolicitud']=='1'){
                                                $tercermesexcep5=$rest1['suma'];
                                                }else{
                                                if($rest1['id_tiposolicitud']=='2'){

                                                    $tercermesboleta5=$rest1['suma'];

                                                }else{
                                                    if($rest1['id_tiposolicitud']=='3'){
                                                    $tercermescer5=$rest1['suma'];
                                                    }else{
                                                    if($rest1['id_tiposolicitud']=='4'){
                                                    $tercermesmed5=$rest1['suma'];
                                                    }
                                                    }
                                                }

                                                }

                                                }
                                                $tercermesotras5=$tercermesexcep5+$tercermesboleta5+$tercermescer5+$tercermesmed5;
                                                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                FROM solicitud as s, usuario as u
                                                where MONTH(s.fecha_solicitud)=$cuartomes5 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='5'
                                                group by s.id_tiposolicitud";
                                            $resultado1 = mysqli_query($coneccion, $codigo1);
                                            $cuartomesotras5=0;
                                            $cuartomesboleta5=0;
                                            $cuartomescer5=0;
                                            $cuartomesexcep5=0;
                                            $cuartomesmed5=0;
                                            while ($rest1 = mysqli_fetch_array($resultado1)) {

                                                if($rest1['id_tiposolicitud']=='1'){
                                                $cuartomesexcep5=$rest1['suma'];
                                                }else{
                                                if($rest1['id_tiposolicitud']=='2'){

                                                    $cuartomesboleta5=$rest1['suma'];

                                                }else{
                                                    if($rest1['id_tiposolicitud']=='3'){
                                                    $cuartomescer5=$rest1['suma'];
                                                    }else{
                                                    if($rest1['id_tiposolicitud']=='4'){
                                                    $cuartomesmed5=$rest1['suma'];
                                                    }
                                                    }
                                                }

                                                }

                                                }
                                                $cuartomesotras5=$cuartomesexcep5+$cuartomesboleta5+$cuartomescer5+$cuartomesmed5;
                                    ?>


                                        "labels": ["<?php echo  $meses[$primermes5];?>", "<?php echo $meses[$segundomes5];?>", "<?php echo $meses[$tercermes5];?>", "<?php echo $meses[$cuartomes5];?>"],
                                        "datasets": [{
                                            "label": "TODAS",
                                            "data": [<?php echo  $primermesotras5;?>, <?php echo  $segundomesotras5;?>, <?php echo  $tercermesotras5;?>, <?php echo  $cuartomesotras5;?>],
                                            "borderColor": "rgb(255, 99, 132)",
                                            "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                        }, {
                                            "label": "EXCEPCIONES",
                                            "data": [<?php echo  $primermesexcep5;?>, <?php echo  $segundomesexcep5;?>, <?php echo  $tercermesexcep5;?>, <?php echo  $cuartomesexcep5;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 162, 235)"
                                        },{
                                            "label": "BOLETAS",
                                            "data": [<?php echo  $primermesboleta5;?>, <?php echo  $segundomesboleta5;?>, <?php echo  $tercermesboleta5;?>, <?php echo  $cuartomesboleta5;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(240, 0, 0)"
                                        }
                                        ,{
                                            "label": "CERTIFICADOS",
                                            "data": [<?php echo  $primermescer5;?>, <?php echo  $segundomescer5;?>, <?php echo  $tercermescer5;?>, <?php echo  $cuartomescer5;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(0, 0,200)"
                                        }
                                        ,{
                                            "label": "BAJAS",
                                            "data": [<?php echo  $primermesmed5;?>, <?php echo  $segundomesmed5;?>, <?php echo  $tercermesmed5;?>, <?php echo  $cuartomesmed5;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 255, 235)"
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>




                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES ANUALES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-68" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-68"), {
                                <?php
                                    $primeranio5= date('Y')-3;
                                    $segundoanio5= date('Y')-2;
                                    $terceranio5= date('Y')-1;
                                    $cuartoanio5= date('Y');

                                    $codigo10 = "SELECT year(s.fecha_solicitud) as year ,COUNT(*) as valor FROM solicitud as s,usuario as u
                                    WHERE s.id_usuario=u.id and u.id_gerencia='5'
                                    group by year(s.fecha_solicitud)";
                                    $resultado10 = mysqli_query($coneccion, $codigo10);
                                    $primeraniosol5=0;
                                    $segundoaniosol5=0;
                                    $terceraniosol5=0;
                                    $cuartoaniosol5=0;
                                    while ($rest10 = mysqli_fetch_array($resultado10)) {


                                    if($rest10['year']==$primeranio5){
                                        $primeraniosol5=$rest10['valor'];
                                    }else{
                                        if($rest10['year']==$segundoanio5){
                                            $segundoaniosol5=$rest10['valor'];
                                        }else{
                                            if($rest10['year']==$terceranio5){
                                                $terceraniosol5=$rest10['valor'];

                                            }else{
                                                if($rest10['year']==$cuartoanio5){
                                                    $cuartoaniosol5=$rest10['valor'];
                                                }
                                            }
                                        }
                                    }
                                    }


                                ?>
                                    "type": "line",
                                    "data": {
                                        "labels": ["<?php echo  $primeranio5 ;?>", "<?php echo $segundoanio5 ;?>", "<?php echo $terceranio5 ;?>", "<?php echo $cuartoanio5 ;?>"],
                                        "datasets": [{
                                            "label": "SOLICITUDES",
                                            "data": [<?php echo  $primeraniosol5 ;?>, <?php echo $segundoaniosol5 ;?>, <?php echo $terceraniosol5 ;?>, <?php echo $cuartoaniosol5 ;?>],
                                            "fill": false,
                                            "borderColor": "rgb(75, 192, 192)",
                                            "lineTension": 0.1
                                        }]
                                    },
                                    "options": {}
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>
                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES DEL ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-69" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-69"), {
                                    "type": "bar",
                                    "data": {
                                    <?php
if($cuartomes==1){
    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
    FROM solicitud as s,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes5 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='5'
    group by s.id_tiposolicitud ";
}else{
    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
    FROM solicitud as s,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes5 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='5'
    group by s.id_tiposolicitud ";
}

                                        $resultado9 = mysqli_query($coneccion, $codigo9);
                                        $excepcionesmes5=0;
                                        $boletames5=0;
                                        $certificadomes5=0;
                                        $medicomes5=0;

                                        while ($rest9 = mysqli_fetch_array($resultado9)) {

                                        //$tiposolicitud=$rest['id_tiposolicitud'];
                                        //$valor=$rest['valor'];
                                        if($rest9['id_tiposolicitud']=='1'){
                                            $excepcionesmes5=$rest9['valor'];
                                        }else{
                                            if($rest9['id_tiposolicitud']=='2'){
                                                $boletames5=$rest9['valor'];
                                            }else{
                                                if($rest9['id_tiposolicitud']=='3'){
                                                    $certificadomes5=$rest9['valor'];

                                                }else{
                                                    if($rest9['id_tiposolicitud']=='4'){
                                                        $medicomes5=$rest9['valor'];
                                                    }
                                                }
                                            }
                                        }
                                        }

                                    ?>


                                        "labels": ["EXCEPCIONES", "CERTIFICADOS", "BOLETAS", "BAJAS MEDICAS"],
                                        "datasets": [{
                                            "label": " <?php  echo $meses[$tercermes5];?>",
                                            "data": [<?php  echo $excepcionesmes5;?>, <?php  echo $certificadomes5;?>, <?php  echo $boletames5;?>, <?php  echo $medicomes5;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">EXCEPCIONES ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-70" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-70"), {
                                    "type": "bar",
                                    "data": {


                                <?php
    if($cuartomes==1){
        $codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor
        FROM solicitud as s ,usuario as u
        where MONTH(s.fecha_solicitud)=$tercermes5 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='5'
        group by s.id_tipoexcepcion";
    }else{
        $codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor
        FROM solicitud as s ,usuario as u
        where MONTH(s.fecha_solicitud)=$tercermes5 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='5'
        group by s.id_tipoexcepcion";
    }

                                            $resultado9 = mysqli_query($coneccion, $codigo9);
                                            $permisomes5=0;
                                            $vacacionesmes5=0;
                                            $comisionmes5=0;
                                            while ($rest9 = mysqli_fetch_array($resultado9)) {

                                            //$tiposolicitud=$rest['id_tiposolicitud'];
                                            //$valor=$rest['valor'];
                                            if($rest9['id_tipoexcepcion']=='1'){
                                                $permisomes5=$rest9['valor'];
                                            }else{
                                                if($rest9['id_tipoexcepcion']=='2'){
                                                    $vacacionesmes5=$rest9['valor'];
                                                }else{
                                                    if($rest9['id_tipoexcepcion']=='3'){
                                                        $comisionmes5=$rest9['valor'];

                                                    }else{
                                                        }
                                                    }
                                                }

                                            }

                                ?>
                                        "labels": ["VACACIONES", "COMISIONES", "PERMISOS"],
                                        "datasets": [{
                                            "label": "<?php  echo $meses[$tercermes5];?>",
                                            "data": [<?php  echo $vacacionesmes5;?>, <?php  echo $comisionmes5;?>, <?php  echo $permisomes5;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes realizadas</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-71" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-71"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["Excepciones", "Boleta de pago", "Certificado", "Baja Medica"],
                                        "datasets": [{
                                            "label": "Issues",

                                    <?php
                                            $anioactual=date("Y");
                                            $codigo = "SELECT s.id_tiposolicitud, COUNT(*) as valor
                                            FROM solicitud as s , usuario as u
                                            where year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='5'
                                            group by s.id_tiposolicitud
                                            ";
                                            $resultado = mysqli_query($coneccion, $codigo);
                                            $excepciones5=0;
                                            $boleta5=0;
                                            $certificado5=0;
                                            $medico5=0;
                                            while ($rest = mysqli_fetch_array($resultado)) {

                                            //$tiposolicitud=$rest['id_tiposolicitud'];
                                            //$valor=$rest['valor'];
                                            if($rest['id_tiposolicitud']=='1'){
                                                $excepciones5=$rest['valor'];
                                            }else{
                                                if($rest['id_tiposolicitud']=='2'){
                                                    $boleta5=$rest['valor'];
                                                }else{
                                                    if($rest['id_tiposolicitud']=='3'){
                                                        $certificado5=$rest['valor'];

                                                    }else{
                                                        if($rest['id_tiposolicitud']=='4'){
                                                            $medico5=$rest['valor'];
                                                        }
                                                    }
                                                }
                                            }
                                            }

                                    ?>

                                           "data": [<?php echo $excepciones5;?>,<?php echo $boleta5;?>, <?php echo $certificado5;?>, <?php echo $medico5;?>],

                                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)", "rgb(50, 20, 86)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes  de tipo excepcion realizadas en el año</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-72" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-72"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["VACACION", "PERMISO", "COMISION"],
                                        "datasets": [{
                                            "label": "Issues",

                                    <?php
                                            $anioactual=date("Y");
                                            $codigo = "SELECT s.id_tipoexcepcion, COUNT(*) as valor FROM solicitud as s , usuario as u
                                            WHERE year(s.fecha_solicitud)='$anioactual' and s.id_usuario=u.id and u.id_gerencia='5'
                                            group by s.id_tipoexcepcion";
                                            $resultado = mysqli_query($coneccion, $codigo);
                                            $permiso5=0;
                                            $vacacion5=0;
                                            $comision5=0;
                                            while ($rest = mysqli_fetch_array($resultado)) {

                                            if($rest['id_tipoexcepcion']=='1'){
                                                $permiso5=$rest['valor'];
                                            }else{
                                                if($rest['id_tipoexcepcion']=='2'){
                                                    $vacacion5=$rest['valor'];
                                                }else{
                                                    if($rest['id_tipoexcepcion']=='3'){
                                                        $comision5=$rest['valor'];

                                                    }else{

                                                    }
                                                }
                                            }
                                            }

                                    ?>

                                           "data": [<?php echo $vacacion5;?>,<?php echo $permiso5;?>, <?php echo $comision5;?>],

                                            "backgroundColor": [ "rgb(0, 162, 235)", "rgb(255, 0, 86)", "rgb(50, 20, 0)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>


            </div>
        </div>
    </div>

    <script>
        /Toggle dropdown list/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /Filter dropdown options/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>


</div>
<div id="div6"  style="display:none">
          <h1>GERENCIA ...</h1>
          <?php
                $coneccion = mysqli_connect ("localhost", "root", "" );
                $basededatos = 'cotel';
                $bd =mysqli_select_db ($coneccion, $basededatos);
                $anioactual=date("Y");

             ?>


        <div class="main-content bg-gray-800 mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="flex flex-row flex-wrap flex-grow mt-2">

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class=" text-center font-bold uppercase text-gray-600"> TODAS LAS SOLICITUDES REALIZADAS</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-73" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-73"), {
                                    "type": "bar",
                                    "data": {
                                        <?php
                                            $meses = array(" ","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                            $primermes6= $primermes;
                                            $segundomes6= $segundomes;
                                            $tercermes6= $tercermes;
                                            $cuartomes6= $cuartomes;
                                            if($cuartomes==1||$cuartomes==2||$cuartomes==3){
                                                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                FROM solicitud as s, usuario as u
                                                where MONTH(s.fecha_solicitud)=$primermes6 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='6'
                                                group by s.id_tiposolicitud";
                                            }else{
                                                $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                FROM solicitud as s, usuario as u
                                                where MONTH(s.fecha_solicitud)=$primermes6 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='6'
                                                group by s.id_tiposolicitud";
                                            }


                                            $resultado1 = mysqli_query($coneccion, $codigo1);
                                            $primermesotras6=0;
                                            $primermesboleta6=0;
                                            $primermescer6=0;
                                            $primermesexcep6=0;
                                            $primermesmed6=0;
                                            while ($rest1 = mysqli_fetch_array($resultado1)) {

                                                if($rest1['id_tiposolicitud']=='1'){
                                                $primermesexcep6=$rest1['suma'];
                                                }else{
                                                if($rest1['id_tiposolicitud']=='2'){

                                                    $primermesboleta6=$rest1['suma'];

                                                }else{
                                                    if($rest1['id_tiposolicitud']=='3'){
                                                    $primermescer6=$rest1['suma'];
                                                    }else{
                                                    if($rest1['id_tiposolicitud']=='4'){
                                                    $primermesmed6=$rest1['suma'];
                                                    }
                                                    }
                                                }

                                                }

                                                }
                                                $primermesotras6=$primermesexcep6+$primermesboleta6+$primermescer6+$primermesmed6;
                                                    if($cuartomes==1||$cuartomes==2){
                                                        $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                        FROM solicitud as s, usuario as u
                                                        where MONTH(s.fecha_solicitud)=$segundomes6 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='6'
                                                        group by s.id_tiposolicitud";
                                                    }else{
                                                        $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                        FROM solicitud as s, usuario as u
                                                        where MONTH(s.fecha_solicitud)=$segundomes6 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='6'
                                                        group by s.id_tiposolicitud";
                                                    }

                                                $resultado1 = mysqli_query($coneccion, $codigo1);
                                                $segundomesotras6=0;
                                                $segundomesboleta6=0;
                                                $segundomescer6=0;
                                                $segundomesexcep6=0;
                                                $segundomesmed6=0;
                                                while ($rest1 = mysqli_fetch_array($resultado1)) {

                                                    if($rest1['id_tiposolicitud']=='1'){
                                                    $segundomesexcep6=$rest1['suma'];
                                                    }else{
                                                    if($rest1['id_tiposolicitud']=='2'){

                                                        $segundomesboleta6=$rest1['suma'];

                                                    }else{
                                                        if($rest1['id_tiposolicitud']=='3'){
                                                        $segundomescer6=$rest1['suma'];
                                                        }else{
                                                        if($rest1['id_tiposolicitud']=='4'){
                                                        $segundomesmed6=$rest1['suma'];
                                                        }
                                                        }
                                                    }

                                                    }

                                                    }
                                                    $segundomesotras6=$segundomesexcep6+$segundomesboleta6+$segundomescer6+$segundomesmed6;
                                                    if($cuartomes==1){
                                                        $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                        FROM solicitud as s, usuario as u
                                                        where MONTH(s.fecha_solicitud)=$tercermes6 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='6'
                                                        group by s.id_tiposolicitud";
                                                    }else{
                                                        $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                        FROM solicitud as s, usuario as u
                                                        where MONTH(s.fecha_solicitud)=$tercermes6 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='6'
                                                        group by s.id_tiposolicitud";
                                                    }

                                                $resultado1 = mysqli_query($coneccion, $codigo1);
                                                $tercermesotras6=0;
                                                $tercermesboleta6=0;
                                                $tercermescer6=0;
                                                $tercermesexcep6=0;
                                                $tercermesmed6=0;
                                                while ($rest1 = mysqli_fetch_array($resultado1)) {

                                                    if($rest1['id_tiposolicitud']=='1'){
                                                    $tercermesexcep6=$rest1['suma'];
                                                    }else{
                                                    if($rest1['id_tiposolicitud']=='2'){

                                                        $tercermesboleta6=$rest1['suma'];

                                                    }else{
                                                        if($rest1['id_tiposolicitud']=='3'){
                                                        $tercermescer6=$rest1['suma'];
                                                        }else{
                                                        if($rest1['id_tiposolicitud']=='4'){
                                                        $tercermesmed6=$rest1['suma'];
                                                        }
                                                        }
                                                    }

                                                    }

                                                    }
                                                    $tercermesotras6=$tercermesexcep6+$tercermesboleta6+$tercermescer6+$tercermesmed6;
                                                    $codigo1 = "SELECT s.id_tiposolicitud, COUNT(*) as suma
                                                    FROM solicitud as s, usuario as u
                                                    where MONTH(s.fecha_solicitud)=$cuartomes6 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='6'
                                                    group by s.id_tiposolicitud";
                                                $resultado1 = mysqli_query($coneccion, $codigo1);
                                                $cuartomesotras6=0;
                                                $cuartomesboleta6=0;
                                                $cuartomescer6=0;
                                                $cuartomesexcep6=0;
                                                $cuartomesmed6=0;
                                                while ($rest1 = mysqli_fetch_array($resultado1)) {

                                                    if($rest1['id_tiposolicitud']=='1'){
                                                    $cuartomesexcep6=$rest1['suma'];
                                                    }else{
                                                    if($rest1['id_tiposolicitud']=='2'){

                                                        $cuartomesboleta6=$rest1['suma'];

                                                    }else{
                                                        if($rest1['id_tiposolicitud']=='3'){
                                                        $cuartomescer6=$rest1['suma'];
                                                        }else{
                                                        if($rest1['id_tiposolicitud']=='4'){
                                                        $cuartomesmed6=$rest1['suma'];
                                                        }
                                                        }
                                                    }

                                                    }

                                                    }
                                                    $cuartomesotras6=$cuartomesexcep6+$cuartomesboleta6+$cuartomescer6+$cuartomesmed6;
                                        ?>


                                        "labels": ["<?php echo  $meses[$primermes6];?>", "<?php echo $meses[$segundomes6];?>", "<?php echo $meses[$tercermes6];?>", "<?php echo $meses[$cuartomes6];?>"],
                                        "datasets": [{
                                            "label": "TODAS",
                                            "data": [<?php echo  $primermesotras6;?>, <?php echo  $segundomesotras6;?>, <?php echo  $tercermesotras6;?>, <?php echo  $cuartomesotras6;?>],
                                            "borderColor": "rgb(255, 99, 132)",
                                            "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                        }, {
                                            "label": "EXCEPCIONES",
                                            "data": [<?php echo  $primermesexcep6;?>, <?php echo  $segundomesexcep6;?>, <?php echo  $tercermesexcep6;?>, <?php echo  $cuartomesexcep6;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 162, 235)"
                                        },{
                                            "label": "BOLETAS",
                                            "data": [<?php echo  $primermesboleta6;?>, <?php echo  $segundomesboleta6;?>, <?php echo  $tercermesboleta6;?>, <?php echo  $cuartomesboleta6;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(240, 0, 0)"
                                        }
                                        ,{
                                            "label": "CERTIFICADOS",
                                            "data": [<?php echo  $primermescer6;?>, <?php echo  $segundomescer6;?>, <?php echo  $tercermescer6;?>, <?php echo  $cuartomescer6;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(0, 0,200)"
                                        }
                                        ,{
                                            "label": "BAJAS",
                                            "data": [<?php echo  $primermesmed6;?>, <?php echo  $segundomesmed6;?>, <?php echo  $tercermesmed6;?>, <?php echo  $cuartomesmed6;?>],
                                            "type": "line",
                                            "fill": false,
                                            "borderColor": "rgb(54, 255, 235)"
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>
                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES ANUALES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-74" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-74"), {
                        <?php
                                                                $primeranio6= date('Y')-3;
                                                                $segundoanio6= date('Y')-2;
                                                                $terceranio6= date('Y')-1;
                                                                $cuartoanio6= date('Y');

                                            $codigo10 = "SELECT year(s.fecha_solicitud) as year ,COUNT(*) as valor FROM solicitud as s,usuario as u
                                            WHERE s.id_usuario=u.id and u.id_gerencia='6'
                                            group by year(s.fecha_solicitud)";
                                            $resultado10 = mysqli_query($coneccion, $codigo10);
                                            $primeraniosol6=0;
                                            $segundoaniosol6=0;
                                            $terceraniosol6=0;
                                            $cuartoaniosol6=0;
                                            while ($rest10 = mysqli_fetch_array($resultado10)) {


                                            if($rest10['year']==$primeranio6){
                                                $primeraniosol6=$rest10['valor'];
                                            }else{
                                                if($rest10['year']==$segundoanio6){
                                                    $segundoaniosol6=$rest10['valor'];
                                                }else{
                                                    if($rest10['year']==$terceranio6){
                                                        $terceraniosol6=$rest10['valor'];

                                                    }else{
                                                        if($rest10['year']==$cuartoanio6){
                                                            $cuartoaniosol6=$rest10['valor'];
                                                        }
                                                    }
                                                }
                                            }
                                            }


                        ?>
                                    "type": "line",
                                    "data": {
                                        "labels": ["<?php echo  $primeranio6 ;?>", "<?php echo $segundoanio6 ;?>", "<?php echo $terceranio6 ;?>", "<?php echo $cuartoanio6 ;?>"],
                                        "datasets": [{
                                            "label": "SOLICITUDES",
                                            "data": [<?php echo  $primeraniosol6 ;?>, <?php echo $segundoaniosol6 ;?>, <?php echo $terceraniosol6 ;?>, <?php echo $cuartoaniosol6 ;?>],
                                            "fill": false,
                                            "borderColor": "rgb(75, 192, 192)",
                                            "lineTension": 0.1
                                        }]
                                    },
                                    "options": {}
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>
                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                     <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">SOLICITUDES DEL ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-100" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-100"), {
                                    "type": "bar",
                                    "data": {
                            <?php
                                   // $tercermes= date('n')-1;
                                   if($cuartomes==1){
                                    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
                                    FROM solicitud as s,usuario as u
                                    where MONTH(s.fecha_solicitud)=$tercermes6 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='6'
                                    group by s.id_tiposolicitud ";
                                   }else{
                                    $codigo9 = "SELECT s.id_tiposolicitud, COUNT(*) as valor
                                    FROM solicitud as s,usuario as u
                                    where MONTH(s.fecha_solicitud)=$tercermes6 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='6'
                                    group by s.id_tiposolicitud ";
                                   }

                                    $resultado9 = mysqli_query($coneccion, $codigo9);
                                    $excepcionesmes6=0;
                                    $boletames6=0;
                                    $certificadomes6=0;
                                    $medicomes6=0;

                                    while ($rest9 = mysqli_fetch_array($resultado9)) {

                                    //$tiposolicitud=$rest['id_tiposolicitud'];
                                    //$valor=$rest['valor'];
                                    if($rest9['id_tiposolicitud']=='1'){
                                        $excepcionesmes6=$rest9['valor'];
                                    }else{
                                        if($rest9['id_tiposolicitud']=='2'){
                                            $boletames6=$rest9['valor'];
                                        }else{
                                            if($rest9['id_tiposolicitud']=='3'){
                                                $certificadomes6=$rest9['valor'];

                                            }else{
                                                if($rest9['id_tiposolicitud']=='4'){
                                                    $medicomes6=$rest9['valor'];
                                                }
                                            }
                                        }
                                    }
                                    }

                            ?>


                                        "labels": ["EXCEPCIONES", "CERTIFICADOS", "BOLETAS", "BAJAS MEDICAS"],
                                        "datasets": [{
                                            "label": " <?php  echo $meses[$tercermes6];?>",
                                            "data": [<?php  echo $excepcionesmes6;?>, <?php  echo $certificadomes6;?>, <?php  echo $boletames6;?>, <?php  echo $medicomes6;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">EXCEPCIONES ULTIMO MES</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-76" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-76"), {
                                    "type": "bar",
                                    "data": {


                                <?php
if($cuartomes==1){
    $codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor
    FROM solicitud as s ,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes6 and year(s.fecha_solicitud)=$anio and s.id_usuario=u.id and u.id_gerencia='6'
    group by s.id_tipoexcepcion";
}else{
    $codigo9 = "SELECT s.id_tipoexcepcion, COUNT(*) as valor
    FROM solicitud as s ,usuario as u
    where MONTH(s.fecha_solicitud)=$tercermes6 and year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='6'
    group by s.id_tipoexcepcion";
}

                                                $resultado9 = mysqli_query($coneccion, $codigo9);
                                                $permisomes6=0;
                                                $vacacionesmes6=0;
                                                $comisionmes6=0;
                                                while ($rest9 = mysqli_fetch_array($resultado9)) {

                                                //$tiposolicitud=$rest['id_tiposolicitud'];
                                                //$valor=$rest['valor'];
                                                if($rest9['id_tipoexcepcion']=='1'){
                                                    $permisomes6=$rest9['valor'];
                                                }else{
                                                    if($rest9['id_tipoexcepcion']=='2'){
                                                        $vacacionesmes6=$rest9['valor'];
                                                    }else{
                                                        if($rest9['id_tipoexcepcion']=='3'){
                                                            $comisionmes6=$rest9['valor'];

                                                        }else{
                                                            }
                                                        }
                                                    }

                                                }

                                ?>
                                        "labels": ["VACACIONES", "COMISIONES", "PERMISOS"],
                                        "datasets": [{
                                            "label": "<?php  echo $meses[$tercermes6];?>",
                                            "data": [<?php  echo $vacacionesmes6;?>, <?php  echo $comisionmes6;?>, <?php  echo $permisomes6;?>],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes realizadas</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-77" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-77"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["Excepciones", "Boleta de pago", "Certificado", "Baja Medica"],
                                        "datasets": [{
                                            "label": "Issues",

                                    <?php
                                                $anioactual=date("Y");
                                                $codigo = "SELECT s.id_tiposolicitud, COUNT(*) as valor
                                                FROM solicitud as s , usuario as u
                                                where year(s.fecha_solicitud)=$anioactual and s.id_usuario=u.id and u.id_gerencia='6'
                                                group by s.id_tiposolicitud
                                                ";
                                                $resultado = mysqli_query($coneccion, $codigo);
                                                $excepciones6=0;
                                                $boleta6=0;
                                                $certificado6=0;
                                                $medico6=0;
                                                while ($rest = mysqli_fetch_array($resultado)) {

                                                //$tiposolicitud=$rest['id_tiposolicitud'];
                                                //$valor=$rest['valor'];
                                                if($rest['id_tiposolicitud']=='1'){
                                                    $excepciones6=$rest['valor'];
                                                }else{
                                                    if($rest['id_tiposolicitud']=='2'){
                                                        $boleta6=$rest['valor'];
                                                    }else{
                                                        if($rest['id_tiposolicitud']=='3'){
                                                            $certificado6=$rest['valor'];

                                                        }else{
                                                            if($rest['id_tiposolicitud']=='4'){
                                                                $medico6=$rest['valor'];
                                                            }
                                                        }
                                                    }
                                                }
                                                }

                                    ?>

                                           "data": [<?php echo $excepciones6;?>,<?php echo $boleta6;?>, <?php echo $certificado6;?>, <?php echo $medico6;?>],

                                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)", "rgb(50, 20, 86)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class=" md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Cantidad de solicitudes  de tipo excepcion realizadas en el año</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-78" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-78"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["VACACION", "PERMISO", "COMISION"],
                                        "datasets": [{
                                            "label": "Issues",

                            <?php
                                    $anioactual=date("Y");
                                    $codigo = "SELECT s.id_tipoexcepcion, COUNT(*) as valor FROM solicitud as s , usuario as u
                                    WHERE year(s.fecha_solicitud)='$anioactual' and s.id_usuario=u.id and u.id_gerencia='6'
                                    group by s.id_tipoexcepcion";
                                    $permiso6=0;
                                    $vacacion6=0;
                                    $comision6=0;

                                    $resultado = mysqli_query($coneccion, $codigo);
                                    while ($rest = mysqli_fetch_array($resultado)) {

                                    if($rest['id_tipoexcepcion']=='1'){
                                        $permiso6=$rest['valor'];
                                    }else{
                                        if($rest['id_tipoexcepcion']=='2'){
                                            $vacacion6=$rest['valor'];
                                        }else{
                                            if($rest['id_tipoexcepcion']=='3'){
                                                $comision6=$rest['valor'];

                                            }else{

                                            }
                                        }
                                    }
                                    }

                            ?>

                                           "data": [<?php echo $vacacion6;?>,<?php echo $permiso6;?>, <?php echo $comision6;?>],

                                            "backgroundColor": [ "rgb(0, 162, 235)", "rgb(255, 0, 86)", "rgb(50, 20, 0)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>


            </div>
        </div>
</div>

    <script>
            /Toggle dropdown list/
            function toggleDD(myDropMenu) {
                document.getElementById(myDropMenu).classList.toggle("invisible");
            }
            /Filter dropdown options/
            function filterDD(myDropMenu, myDropMenuSearch) {
                var input, filter, ul, li, a, i;
                input = document.getElementById(myDropMenuSearch);
                filter = input.value.toUpperCase();
                div = document.getElementById(myDropMenu);
                a = div.getElementsByTagName("a");
                for (i = 0; i < a.length; i++) {
                    if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                    } else {
                        a[i].style.display = "none";
                    }
                }
            }
            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                    var dropdowns = document.getElementsByClassName("dropdownlist");
                    for (var i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (!openDropdown.classList.contains('invisible')) {
                            openDropdown.classList.add('invisible');
                        }
                    }
                }
            }
    </script>

          </div>




                </div>
             </div>
        </div>
</div>
    <script>
        $(document).ready(function() {
        $("#sistemas").click(function() {
            $("#div1").show();
            $("#div2").hide();
            $("#div3").hide();
            $("#div4").hide();
            $("#div5").hide();
            $("#div6").hide();
            $("#div7").hide();

        });

        $("#recursos").click(function() {
            $("#div1").hide();
            $("#div2").show();
            $("#div3").hide();
            $("#div4").hide();
            $("#div5").hide();
            $("#div6").hide();
            $("#div7").hide();


        });
        $("#tercera").click(function() {
            $("#div1").hide();
            $("#div2").hide();
            $("#div3").show();
            $("#div4").hide();
            $("#div5").hide();
            $("#div6").hide();
            $("#div7").hide();

        });
        $("#cuarta").click(function() {
            $("#div1").hide();
            $("#div2").hide();
            $("#div3").hide();
            $("#div4").show();
            $("#div5").hide();
            $("#div6").hide();
            $("#div7").hide();


        });
        $("#quinta").click(function() {
            $("#div1").hide();
            $("#div2").hide();
            $("#div3").hide();
            $("#div4").hide();
            $("#div5").show();
            $("#div6").hide();


        });
        $("#sexta").click(function() {
            $("#div1").hide();
            $("#div2").hide();
            $("#div3").hide();
            $("#div4").hide();
            $("#div5").hide();
            $("#div6").show();

        });

        });
    </script>

    <script>
        /Toggle dropdown list/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /Filter dropdown options/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>

    @endsection
