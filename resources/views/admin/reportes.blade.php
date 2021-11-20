
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



    <!--Nav-->



    <div class="mx-auto max-w-4x3">

<?php
 $coneccion = mysqli_connect ("localhost", "root", "" );
 $basededatos = 'cotel';
 $bd =mysqli_select_db ($coneccion, $basededatos);
 $anioactual=date("Y");
 $anio=date("Y")-1;

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

if($cuartomes==1||$cuartomes==2||$cuartomes==3){

    $codigo1 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=1 and MONTH(fecha_solicitud)=$primermes and year(fecha_solicitud)='$anio'";
    $resultado1 = mysqli_query($coneccion, $codigo1);
    while ($rest1 = mysqli_fetch_array($resultado1)) {
        $primermesexcep=$rest1['suma'];
    }

$codigo5 = "SELECT COUNT(*) as suma FROM `solicitud` where  MONTH(fecha_solicitud)=$primermes and year(fecha_solicitud)='$anio'";
$resultado5 = mysqli_query($coneccion, $codigo5);
while ($rest5 = mysqli_fetch_array($resultado5)) {
    $primermesotras=$rest5['suma'];

}
$codigo1 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=2 and MONTH(fecha_solicitud)=$primermes and year(fecha_solicitud)='$anio'";
$resultado1 = mysqli_query($coneccion, $codigo1);
while ($rest1 = mysqli_fetch_array($resultado1)) {
    $primermesboleta=$rest1['suma'];
}
$codigo1 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=3 and MONTH(fecha_solicitud)=$primermes and year(fecha_solicitud)='$anio'";
$resultado1 = mysqli_query($coneccion, $codigo1);
while ($rest1 = mysqli_fetch_array($resultado1)) {
    $primermescer=$rest1['suma'];
}
$codigo1 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=4 and MONTH(fecha_solicitud)=$primermes and year(fecha_solicitud)='$anio'" ;
$resultado1 = mysqli_query($coneccion, $codigo1);
while ($rest1 = mysqli_fetch_array($resultado1)) {
    $primermesmed=$rest1['suma'];
}
}else{
    $codigo1 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=1 and MONTH(fecha_solicitud)=$primermes and year(fecha_solicitud)='$anioactual'";
    $resultado1 = mysqli_query($coneccion, $codigo1);
    while ($rest1 = mysqli_fetch_array($resultado1)) {
        $primermesexcep=$rest1['suma'];
    }

$codigo5 = "SELECT COUNT(*) as suma FROM `solicitud` where  MONTH(fecha_solicitud)=$primermes and year(fecha_solicitud)='$anioactual'";
$resultado5 = mysqli_query($coneccion, $codigo5);
while ($rest5 = mysqli_fetch_array($resultado5)) {
    $primermesotras=$rest5['suma'];
}
$codigo1 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=2 and MONTH(fecha_solicitud)=$primermes and year(fecha_solicitud)='$anioactual'";
$resultado1 = mysqli_query($coneccion, $codigo1);
while ($rest1 = mysqli_fetch_array($resultado1)) {
    $primermesboleta=$rest1['suma'];
}
$codigo1 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=3 and MONTH(fecha_solicitud)=$primermes and year(fecha_solicitud)='$anioactual'";
$resultado1 = mysqli_query($coneccion, $codigo1);
while ($rest1 = mysqli_fetch_array($resultado1)) {
    $primermescer=$rest1['suma'];
}
$codigo1 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=4 and MONTH(fecha_solicitud)=$primermes and year(fecha_solicitud)='$anioactual'" ;
$resultado1 = mysqli_query($coneccion, $codigo1);
while ($rest1 = mysqli_fetch_array($resultado1)) {
    $primermesmed=$rest1['suma'];
}
}


if($cuartomes==1||$cuartomes==2){


$codigo2 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=1 and MONTH(fecha_solicitud)=$segundomes and year(fecha_solicitud)='$anio'";
$resultado2 = mysqli_query($coneccion, $codigo2);
while ($rest2 = mysqli_fetch_array($resultado2)) {
    $segundomesexcep=$rest2['suma'];
}

$codigo6 = "SELECT COUNT(*) as suma FROM `solicitud` where  MONTH(fecha_solicitud)=$segundomes and year(fecha_solicitud)='$anio'";
$resultado6 = mysqli_query($coneccion, $codigo6);
while ($rest6 = mysqli_fetch_array($resultado6)) {
    $segundomesotras=$rest6['suma'];
}
$codigo2 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=2 and MONTH(fecha_solicitud)=$segundomes and year(fecha_solicitud)='$anio'";
$resultado2 = mysqli_query($coneccion, $codigo2);
while ($rest2 = mysqli_fetch_array($resultado2)) {
    $segundomesboleta=$rest2['suma'];
}
$codigo2 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=3 and MONTH(fecha_solicitud)=$segundomes and year(fecha_solicitud)='$anio'";
$resultado2 = mysqli_query($coneccion, $codigo2);
while ($rest2 = mysqli_fetch_array($resultado2)) {
    $segundomescer=$rest2['suma'];
}
$codigo2 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=4 and MONTH(fecha_solicitud)=$segundomes and year(fecha_solicitud)='$anio'";
$resultado2 = mysqli_query($coneccion, $codigo2);
while ($rest2 = mysqli_fetch_array($resultado2)) {
    $segundomesmed=$rest2['suma'];
}
}else{

$codigo2 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=1 and MONTH(fecha_solicitud)=$segundomes and year(fecha_solicitud)='$anioactual'";
$resultado2 = mysqli_query($coneccion, $codigo2);
while ($rest2 = mysqli_fetch_array($resultado2)) {
    $segundomesexcep=$rest2['suma'];
}

$codigo6 = "SELECT COUNT(*) as suma FROM `solicitud` where  MONTH(fecha_solicitud)=$segundomes and year(fecha_solicitud)='$anioactual'";
$resultado6 = mysqli_query($coneccion, $codigo6);
while ($rest6 = mysqli_fetch_array($resultado6)) {
    $segundomesotras=$rest6['suma'];
}
$codigo2 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=2 and MONTH(fecha_solicitud)=$segundomes and year(fecha_solicitud)='$anioactual'";
$resultado2 = mysqli_query($coneccion, $codigo2);
while ($rest2 = mysqli_fetch_array($resultado2)) {
    $segundomesboleta=$rest2['suma'];
}
$codigo2 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=3 and MONTH(fecha_solicitud)=$segundomes and year(fecha_solicitud)='$anioactual'";
$resultado2 = mysqli_query($coneccion, $codigo2);
while ($rest2 = mysqli_fetch_array($resultado2)) {
    $segundomescer=$rest2['suma'];
}
$codigo2 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=4 and MONTH(fecha_solicitud)=$segundomes and year(fecha_solicitud)='$anioactual'";
$resultado2 = mysqli_query($coneccion, $codigo2);
while ($rest2 = mysqli_fetch_array($resultado2)) {
    $segundomesmed=$rest2['suma'];
}
}

if($cuartomes==1){
    $codigo3 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=1 and MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anio'";
    $resultado3= mysqli_query($coneccion, $codigo3);
    while ($rest3 = mysqli_fetch_array($resultado3)) {
        $tercermesexcep=$rest3['suma'];
    }

$codigo7 = "SELECT COUNT(*) as suma FROM `solicitud` where  MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anio'";
$resultado7 = mysqli_query($coneccion, $codigo7);
while ($rest7 = mysqli_fetch_array($resultado7)) {
    $tercermesotras=$rest7['suma'];
}
$codigo3 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=2 and MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anio'";
$resultado3= mysqli_query($coneccion, $codigo3);
while ($rest3 = mysqli_fetch_array($resultado3)) {
    $tercermesboleta=$rest3['suma'];
}
$codigo3 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=3 and MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anio'";
$resultado3= mysqli_query($coneccion, $codigo3);
while ($rest3 = mysqli_fetch_array($resultado3)) {
    $tercermescer=$rest3['suma'];
}

$codigo3 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=4 and MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anio'";
$resultado3= mysqli_query($coneccion, $codigo3);
while ($rest3 = mysqli_fetch_array($resultado3)) {
    $tercermesmed=$rest3['suma'];
}

}else{

    $codigo3 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=1 and MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anioactual'";
$resultado3= mysqli_query($coneccion, $codigo3);
while ($rest3 = mysqli_fetch_array($resultado3)) {
    $tercermesexcep=$rest3['suma'];
}

$codigo7 = "SELECT COUNT(*) as suma FROM `solicitud` where  MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anioactual'";
$resultado7 = mysqli_query($coneccion, $codigo7);
while ($rest7 = mysqli_fetch_array($resultado7)) {
    $tercermesotras=$rest7['suma'];
}



$codigo3 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=2 and MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anioactual'";
$resultado3= mysqli_query($coneccion, $codigo3);
while ($rest3 = mysqli_fetch_array($resultado3)) {
    $tercermesboleta=$rest3['suma'];
}
$codigo3 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=3 and MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anioactual'";
$resultado3= mysqli_query($coneccion, $codigo3);
while ($rest3 = mysqli_fetch_array($resultado3)) {
    $tercermescer=$rest3['suma'];
}

$codigo3 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=4 and MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anioactual'";
$resultado3= mysqli_query($coneccion, $codigo3);
while ($rest3 = mysqli_fetch_array($resultado3)) {
    $tercermesmed=$rest3['suma'];
}
}
$codigo8 = "SELECT COUNT(*) as suma FROM `solicitud` where  MONTH(fecha_solicitud)=$cuartomes and year(fecha_solicitud)='$anioactual'";
$resultado8 = mysqli_query($coneccion, $codigo8);
while ($rest8 = mysqli_fetch_array($resultado8)) {
    $cuartomesotras=$rest8['suma'];
}


$codigo4 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=1 and MONTH(fecha_solicitud)=$cuartomes and year(fecha_solicitud)='$anioactual'";
$resultado4 = mysqli_query($coneccion, $codigo4);
while ($rest4 = mysqli_fetch_array($resultado4)) {
    $cuartomesexcep=$rest4['suma'];
}



$codigo4 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=2 and MONTH(fecha_solicitud)=$cuartomes and year(fecha_solicitud)='$anioactual'";
$resultado4 = mysqli_query($coneccion, $codigo4);
while ($rest4 = mysqli_fetch_array($resultado4)) {
    $cuartomesboleta=$rest4['suma'];
}



$codigo4 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=3 and MONTH(fecha_solicitud)=$cuartomes and year(fecha_solicitud)='$anioactual'";
$resultado4 = mysqli_query($coneccion, $codigo4);
while ($rest4 = mysqli_fetch_array($resultado4)) {
    $cuartomescer=$rest4['suma'];
}


$codigo4 = "SELECT COUNT(*) as suma FROM `solicitud` where id_tiposolicitud=4 and MONTH(fecha_solicitud)=$cuartomes and year(fecha_solicitud)='$anioactual'";
$resultado4 = mysqli_query($coneccion, $codigo4);
while ($rest4 = mysqli_fetch_array($resultado4)) {
    $cuartomesmed=$rest4['suma'];
}

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




                <div class="md:w-1/2 xl:w-1/2 p-3">
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

$codigo10 = "SELECT year(fecha_solicitud) as year ,COUNT(*) as valor FROM solicitud
group by year(fecha_solicitud)";
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
                            <canvas id="chartjs-10" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-10"), {
                                    "type": "bar",
                                    "data": {
<?php
if($cuartomes==1){
    $codigo9 = "SELECT id_tiposolicitud, COUNT(*) as valor FROM solicitud where MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anio' group by id_tiposolicitud";

}else{
    $codigo9 = "SELECT id_tiposolicitud, COUNT(*) as valor FROM solicitud where MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anioactual' group by id_tiposolicitud";

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
                                            "label": " <?php  echo $meses[$tercermes];?>",
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
                            <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-1"), {
                                    "type": "bar",
                                    "data": {


                                        <?php
                                        
if($cuartomes==1){
    $codigo9 = "SELECT id_tipoexcepcion, COUNT(*) as valor FROM solicitud where MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anio' group by id_tipoexcepcion";

}else{
    $codigo9 = "SELECT id_tipoexcepcion, COUNT(*) as valor FROM solicitud where MONTH(fecha_solicitud)=$tercermes and year(fecha_solicitud)='$anioactual' group by id_tipoexcepcion";

}
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
$codigo = "SELECT id_tiposolicitud, COUNT(*) as valor FROM solicitud where year(fecha_solicitud)='$anioactual' group by id_tiposolicitud";
$resultado = mysqli_query($coneccion, $codigo);

$excepciones=0;
$boleta=0;
$certificado=0;
$medico=0;
while ($rest = mysqli_fetch_array($resultado)) {

//$tiposolicitud=$rest['id_tiposolicitud'];
//$valor=$rest['valor'];

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
$codigo = "SELECT id_tipoexcepcion, COUNT(*) as valor FROM solicitud
WHERE year(fecha_solicitud)='$anioactual'
group by id_tipoexcepcion";
$resultado = mysqli_query($coneccion, $codigo);
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
    @endsection
