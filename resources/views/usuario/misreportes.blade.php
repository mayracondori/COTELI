
@extends('layouts.plantillausuario)
@section('title','usuario')
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

                <div class="w-full md:w-1/2 xl:w-1/2 p-3">

        
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Resultado de la evaluacion  general</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-4"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["Muy bajo","Bajo", "Medio", "Alto", "Medio Alto"],
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

                                           "data": [<?php echo $excepciones;?>,<?php echo $boleta;?>, <?php echo $certificado;?>, <?php echo $medico;?>,10],

                                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)", "rgb(50, 20, 86)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-1/2 xl:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-lg">
                        <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Gerencia Sistemas Tic.</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-20" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-20"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["Muy bajo", "Bajo", "Medio", "Alto", "Muy Alto"],
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

                                           "data": [2,5,<?php echo $vacacion;?>,<?php echo $permiso;?>, <?php echo $comision;?>],

                                            "backgroundColor": [ "rgb(0, 162, 235)", "rgb(255, 0, 86)", "rgb(50, 20, 0)","rgb(255, 205, 86)", "rgb(50, 20, 86)"]
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
