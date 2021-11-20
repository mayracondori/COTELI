@extends('layouts.plantillaadmin')
@section('title','admin')
@section('content')


<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
	  <!--Replace with your tailwind.css once created-->


      <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

	 <!--Regular Datatables CSS-->
	 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">


   </head>


<div class="mx-auto max-w-4x3">
            <?php
            $coneccion = mysqli_connect ("localhost", "root", "" );
            $basededatos = 'cotel';
            $bd =mysqli_select_db ($coneccion, $basededatos);
            $anioactual=date("Y");
           
             ?>
<h1 class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2"> <p class="text-4xl ">Empleados con permiso actual por gerencias seleccione una:</p> </h1>

<br>

<div class="grid grid-cols-3 gap-4">
    <div class="..."></div>
    <div class="row bg-yellow-200 " >
        <input type="radio" id="sistemas" name="opcion" value="1" required>
        <label for="male">Gerencia de Sistemas</label><br>
        <input type="radio" id="recursos" name="opcion" value="2" required>
        <label for="female">Gerencia de Recursos Humanos</label><br>
        <input type="radio" id="tercera" name="opcion" value="3" required>
        <label for="other">Gerencia deTercera</label><br>
        <input type="radio" id="cuarta" name="opcion" value="4" required>
        <label for="other">Gerencia de Cuarta</label><br>
        <input type="radio" id="quinta" name="opcion" value="5" required>
        <label for="male">Gerencia de quinta</label><br>
        <input type="radio" id="sexta" name="opcion" value="6" required>
        <label for="male">Gerencia de Sexta</label><br>
    </div>
</div>

<!--div1-->

<div id="div1"  style="display:none">

<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

<table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>

                    <tr>
                        <th data-priority="1">NOMBRES</th>
                        <th data-priority="1">APELLIDOS</th>
                        <th data-priority="1">CODIGO</th>
                        <th data-priority="2">TIPO DE EXCEPCION</th>
                        <th data-priority="3">OPCION DE LA LISTA</th>
                    
                        <th data-priority="5">FECHA INICIO</th>
                        <th data-priority="6">FECHA FIN</th>
                        
                    </tr>
                </thead>

                <tbody>
                    <?php
                                    $coneccion = mysqli_connect ("localhost", "root", "" );
                                    $basededatos = 'cotel';
                                    $bd =mysqli_select_db ($coneccion, $basededatos);

                                    $hoy = date("d-m-Y"); 
                                    //$hoy= date_create("29-01-2021");
                                    echo $hoy;

                                    $codigo = " SELECT s.id, s.comentario, u.nombres_usu, u.apellidos_usu, u.codigo_usu, t.nom_tiposolicitud, te.nom_tipoexcepcion, o.nom_opciones, s.fecha_solicitud, s.fechainicio, s.fechafin, s.estado, s.fecharespuesta
                                    FROM usuario AS u, solicitud AS s, tiposolicitud AS t, tipoexcepcion AS te, opcioneslista as o
                                    WHERE s.estado = '1' AND s.id_usuario = u.id AND s.id_tipoexcepcion = te.id_tipoexcepcion AND s.id_opcioneslista = o.id_opcioneslista  AND  s.id_tiposolicitud = t.id_tiposolicitud AND s.fechainicio!='' and u.id_gerencia='1'";



                                    $resultado = mysqli_query($coneccion, $codigo);

                                    while ($rest = mysqli_fetch_array($resultado)) {

                                        $fechainicio=$rest ['fechainicio'];
                                        $fechainicio=$rest ['fechafin'];
                                        if($rest ['fechainicio'] != 'no aplica'){
                                            //$fechainicio = DateTime::createFromFormat('d/m/Y', $rest ['fechainicio']);
                                    // $fechainicio = $rest ['fechainicio']->format("d/m/Y");

                                    // $fechainicio = DateTime::createFromFormat("d/m/Y", $rest ['fechainicio']);
                                    // $fechainicio = $fechainicio->format('d/m/Y');
                                    $date = date_create_from_format('Y-m-d', $rest ['fechainicio']);
                                        $fechainicio = date_format($date, 'd-m-Y');
                                        $date2 = date_create_from_format('Y-m-d', $rest ['fechafin']);
                                        $fechafin = date_format($date2, 'd-m-Y');


                                        $fechahoy= strtotime($hoy);
                                        $fechaf = strtotime($fechafin);
                                        $fechai = strtotime($fechainicio);
                                            
                                    

                                        
                                    if( $fechai <= $fechahoy && $fechaf >= $fechahoy ){
                                    // if( $fechafin >= $hoy){
                                        
                    ?>
                        <tr>
                            <td><?php echo $rest ['nombres_usu']; ?></td>
                                <td><?php echo $rest ['apellidos_usu']; ?></td>
                                <td><?php echo $rest ['codigo_usu']; ?></td>
                                <td><?php echo $rest ['nom_tipoexcepcion']; ?></td>
                                <td><?php echo $rest ['nom_opciones']; ?></td>
                                <td><?php echo $fechainicio; ?></td>
                                <td><?php echo $fechafin; ?></td>
                                
                        </tr>

                        <!--/Card-->
                    <?php
                        
                    }
                        }
                        }

                    ?>

                </tbody>

</table>


</div>

</div> 
<!--div2-->
<div id="div2"  style="display:none">

<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


<table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>

        <tr>
            <th data-priority="1">NOMBRES</th>
            <th data-priority="1">APELLIDOS</th>
            <th data-priority="1">CODIGO</th>
            <th data-priority="2">TIPO DE EXCEPCION</th>
            <th data-priority="3">OPCION DE LA LISTA</th>
           
            <th data-priority="5">FECHA INICIO</th>
            <th data-priority="6">FECHA FIN</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
                        $coneccion = mysqli_connect ("localhost", "root", "" );
                        $basededatos = 'cotel';
                        $bd =mysqli_select_db ($coneccion, $basededatos);

                        $hoy = date("d-m-Y"); 
                        //$hoy= date_create("29-01-2021");
                        echo $hoy;

                        $codigo = " SELECT s.id, s.comentario, u.nombres_usu, u.apellidos_usu, u.codigo_usu, t.nom_tiposolicitud, te.nom_tipoexcepcion, o.nom_opciones, s.fecha_solicitud, s.fechainicio, s.fechafin, s.estado, s.fecharespuesta
                        FROM usuario AS u, solicitud AS s, tiposolicitud AS t, tipoexcepcion AS te, opcioneslista as o
                        WHERE s.estado = '1' AND s.id_usuario = u.id AND s.id_tipoexcepcion = te.id_tipoexcepcion AND s.id_opcioneslista = o.id_opcioneslista  AND  s.id_tiposolicitud = t.id_tiposolicitud AND s.fechainicio!='' and u.id_gerencia='2'";



                        $resultado = mysqli_query($coneccion, $codigo);

                        while ($rest = mysqli_fetch_array($resultado)) {

                            $fechainicio=$rest ['fechainicio'];
                            $fechainicio=$rest ['fechafin'];
                            if($rest ['fechainicio'] != 'no aplica'){
                                //$fechainicio = DateTime::createFromFormat('d/m/Y', $rest ['fechainicio']);
                        // $fechainicio = $rest ['fechainicio']->format("d/m/Y");

                        // $fechainicio = DateTime::createFromFormat("d/m/Y", $rest ['fechainicio']);
                        // $fechainicio = $fechainicio->format('d/m/Y');
                        $date = date_create_from_format('Y-m-d', $rest ['fechainicio']);
                            $fechainicio = date_format($date, 'd-m-Y');
                            $date2 = date_create_from_format('Y-m-d', $rest ['fechafin']);
                            $fechafin = date_format($date2, 'd-m-Y');


                            $fechahoy= strtotime($hoy);
                            $fechaf = strtotime($fechafin);
                            $fechai = strtotime($fechainicio);
                                
                        

                            
                        if( $fechai <= $fechahoy && $fechaf >= $fechahoy ){
                        // if( $fechafin >= $hoy){
                            
        ?>
            <tr>
                <td><?php echo $rest ['nombres_usu']; ?></td>
                    <td><?php echo $rest ['apellidos_usu']; ?></td>
                    <td><?php echo $rest ['codigo_usu']; ?></td>
                    <td><?php echo $rest ['nom_tipoexcepcion']; ?></td>
                    <td><?php echo $rest ['nom_opciones']; ?></td>
                    <td><?php echo $fechainicio; ?></td>
                    <td><?php echo $fechafin; ?></td>
                    
            </tr>

            <!--/Card-->
        <?php
            
        }
            }
            }

        ?>

    </tbody>

</table>


</div>

</div> 





<!--div3-->
<div id="div3"  style="display:none">

<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


<table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>

        <tr>
            <th data-priority="1">NOMBRES</th>
            <th data-priority="1">APELLIDOS</th>
            <th data-priority="1">CODIGO</th>
            <th data-priority="2">TIPO DE EXCEPCION</th>
            <th data-priority="3">OPCION DE LA LISTA</th>
           
            <th data-priority="5">FECHA INICIO</th>
            <th data-priority="6">FECHA FIN</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
                        $coneccion = mysqli_connect ("localhost", "root", "" );
                        $basededatos = 'cotel';
                        $bd =mysqli_select_db ($coneccion, $basededatos);

                        $hoy = date("d-m-Y"); 
                        //$hoy= date_create("29-01-2021");
                        echo $hoy;

                        $codigo = " SELECT s.id, s.comentario, u.nombres_usu, u.apellidos_usu, u.codigo_usu, t.nom_tiposolicitud, te.nom_tipoexcepcion, o.nom_opciones, s.fecha_solicitud, s.fechainicio, s.fechafin, s.estado, s.fecharespuesta
                        FROM usuario AS u, solicitud AS s, tiposolicitud AS t, tipoexcepcion AS te, opcioneslista as o
                        WHERE s.estado = '1' AND s.id_usuario = u.id AND s.id_tipoexcepcion = te.id_tipoexcepcion AND s.id_opcioneslista = o.id_opcioneslista  AND  s.id_tiposolicitud = t.id_tiposolicitud AND s.fechainicio!='' and u.id_gerencia='3'";



                        $resultado = mysqli_query($coneccion, $codigo);

                        while ($rest = mysqli_fetch_array($resultado)) {

                            $fechainicio=$rest ['fechainicio'];
                            $fechainicio=$rest ['fechafin'];
                            if($rest ['fechainicio'] != 'no aplica'){
                                //$fechainicio = DateTime::createFromFormat('d/m/Y', $rest ['fechainicio']);
                        // $fechainicio = $rest ['fechainicio']->format("d/m/Y");

                        // $fechainicio = DateTime::createFromFormat("d/m/Y", $rest ['fechainicio']);
                        // $fechainicio = $fechainicio->format('d/m/Y');
                        $date = date_create_from_format('Y-m-d', $rest ['fechainicio']);
                            $fechainicio = date_format($date, 'd-m-Y');
                            $date2 = date_create_from_format('Y-m-d', $rest ['fechafin']);
                            $fechafin = date_format($date2, 'd-m-Y');


                            $fechahoy= strtotime($hoy);
                            $fechaf = strtotime($fechafin);
                            $fechai = strtotime($fechainicio);
                                
                        

                            
                        if( $fechai <= $fechahoy && $fechaf >= $fechahoy ){
                        // if( $fechafin >= $hoy){
                            
        ?>
            <tr>
                <td><?php echo $rest ['nombres_usu']; ?></td>
                    <td><?php echo $rest ['apellidos_usu']; ?></td>
                    <td><?php echo $rest ['codigo_usu']; ?></td>
                    <td><?php echo $rest ['nom_tipoexcepcion']; ?></td>
                    <td><?php echo $rest ['nom_opciones']; ?></td>
                    <td><?php echo $fechainicio; ?></td>
                    <td><?php echo $fechafin; ?></td>
                    
            </tr>

            <!--/Card-->
        <?php
            
        }
            }
            }

        ?>

    </tbody>

</table>


</div>

</div> 









<!--div4-->
<div id="div4"  style="display:none">

<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


<table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>

        <tr>
            <th data-priority="1">NOMBRES</th>
            <th data-priority="1">APELLIDOS</th>
            <th data-priority="1">CODIGO</th>
            <th data-priority="2">TIPO DE EXCEPCION</th>
            <th data-priority="3">OPCION DE LA LISTA</th>
           
            <th data-priority="5">FECHA INICIO</th>
            <th data-priority="6">FECHA FIN</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
                        $coneccion = mysqli_connect ("localhost", "root", "" );
                        $basededatos = 'cotel';
                        $bd =mysqli_select_db ($coneccion, $basededatos);

                        $hoy = date("d-m-Y"); 
                        //$hoy= date_create("29-01-2021");
                        echo $hoy;

                        $codigo = " SELECT s.id, s.comentario, u.nombres_usu, u.apellidos_usu, u.codigo_usu, t.nom_tiposolicitud, te.nom_tipoexcepcion, o.nom_opciones, s.fecha_solicitud, s.fechainicio, s.fechafin, s.estado, s.fecharespuesta
                        FROM usuario AS u, solicitud AS s, tiposolicitud AS t, tipoexcepcion AS te, opcioneslista as o
                        WHERE s.estado = '1' AND s.id_usuario = u.id AND s.id_tipoexcepcion = te.id_tipoexcepcion AND s.id_opcioneslista = o.id_opcioneslista  AND  s.id_tiposolicitud = t.id_tiposolicitud AND s.fechainicio!='' and u.id_gerencia='4'";



                        $resultado = mysqli_query($coneccion, $codigo);

                        while ($rest = mysqli_fetch_array($resultado)) {

                            $fechainicio=$rest ['fechainicio'];
                            $fechainicio=$rest ['fechafin'];
                            if($rest ['fechainicio'] != 'no aplica'){
                                //$fechainicio = DateTime::createFromFormat('d/m/Y', $rest ['fechainicio']);
                        // $fechainicio = $rest ['fechainicio']->format("d/m/Y");

                        // $fechainicio = DateTime::createFromFormat("d/m/Y", $rest ['fechainicio']);
                        // $fechainicio = $fechainicio->format('d/m/Y');
                        $date = date_create_from_format('Y-m-d', $rest ['fechainicio']);
                            $fechainicio = date_format($date, 'd-m-Y');
                            $date2 = date_create_from_format('Y-m-d', $rest ['fechafin']);
                            $fechafin = date_format($date2, 'd-m-Y');


                            $fechahoy= strtotime($hoy);
                            $fechaf = strtotime($fechafin);
                            $fechai = strtotime($fechainicio);
                                
                        

                            
                        if( $fechai <= $fechahoy && $fechaf >= $fechahoy ){
                        // if( $fechafin >= $hoy){
                            
        ?>
            <tr>
                <td><?php echo $rest ['nombres_usu']; ?></td>
                    <td><?php echo $rest ['apellidos_usu']; ?></td>
                    <td><?php echo $rest ['codigo_usu']; ?></td>
                    <td><?php echo $rest ['nom_tipoexcepcion']; ?></td>
                    <td><?php echo $rest ['nom_opciones']; ?></td>
                    <td><?php echo $fechainicio; ?></td>
                    <td><?php echo $fechafin; ?></td>
                    
            </tr>

            <!--/Card-->
        <?php
            
        }
            }
            }

        ?>

    </tbody>

</table>


</div>

</div> 





<!--div5-->
<div id="div5"  style="display:none">

<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


<table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>

        <tr>
            <th data-priority="1">NOMBRES</th>
            <th data-priority="1">APELLIDOS</th>
            <th data-priority="1">CODIGO</th>
            <th data-priority="2">TIPO DE EXCEPCION</th>
            <th data-priority="3">OPCION DE LA LISTA</th>
           
            <th data-priority="5">FECHA INICIO</th>
            <th data-priority="6">FECHA FIN</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
                        $coneccion = mysqli_connect ("localhost", "root", "" );
                        $basededatos = 'cotel';
                        $bd =mysqli_select_db ($coneccion, $basededatos);

                        $hoy = date("d-m-Y"); 
                        //$hoy= date_create("29-01-2021");
                        echo $hoy;

                        $codigo = " SELECT s.id, s.comentario, u.nombres_usu, u.apellidos_usu, u.codigo_usu, t.nom_tiposolicitud, te.nom_tipoexcepcion, o.nom_opciones, s.fecha_solicitud, s.fechainicio, s.fechafin, s.estado, s.fecharespuesta
                        FROM usuario AS u, solicitud AS s, tiposolicitud AS t, tipoexcepcion AS te, opcioneslista as o
                        WHERE s.estado = '1' AND s.id_usuario = u.id AND s.id_tipoexcepcion = te.id_tipoexcepcion AND s.id_opcioneslista = o.id_opcioneslista  AND  s.id_tiposolicitud = t.id_tiposolicitud AND s.fechainicio!='' and u.id_gerencia='5'";



                        $resultado = mysqli_query($coneccion, $codigo);

                        while ($rest = mysqli_fetch_array($resultado)) {

                            $fechainicio=$rest ['fechainicio'];
                            $fechainicio=$rest ['fechafin'];
                            if($rest ['fechainicio'] != 'no aplica'){
                                //$fechainicio = DateTime::createFromFormat('d/m/Y', $rest ['fechainicio']);
                        // $fechainicio = $rest ['fechainicio']->format("d/m/Y");

                        // $fechainicio = DateTime::createFromFormat("d/m/Y", $rest ['fechainicio']);
                        // $fechainicio = $fechainicio->format('d/m/Y');
                        $date = date_create_from_format('Y-m-d', $rest ['fechainicio']);
                            $fechainicio = date_format($date, 'd-m-Y');
                            $date2 = date_create_from_format('Y-m-d', $rest ['fechafin']);
                            $fechafin = date_format($date2, 'd-m-Y');


                            $fechahoy= strtotime($hoy);
                            $fechaf = strtotime($fechafin);
                            $fechai = strtotime($fechainicio);
                                
                        

                            
                        if( $fechai <= $fechahoy && $fechaf >= $fechahoy ){
                        // if( $fechafin >= $hoy){
                            
        ?>
            <tr>
                <td><?php echo $rest ['nombres_usu']; ?></td>
                    <td><?php echo $rest ['apellidos_usu']; ?></td>
                    <td><?php echo $rest ['codigo_usu']; ?></td>
                    <td><?php echo $rest ['nom_tipoexcepcion']; ?></td>
                    <td><?php echo $rest ['nom_opciones']; ?></td>
                    <td><?php echo $fechainicio; ?></td>
                    <td><?php echo $fechafin; ?></td>
                    
            </tr>

            <!--/Card-->
        <?php
            
        }
            }
            }

        ?>

    </tbody>

</table>


</div>

</div> 

<!--div6-->
<div id="div6"  style="display:none">

<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


<table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>

        <tr>
            <th data-priority="1">NOMBRES</th>
            <th data-priority="1">APELLIDOS</th>
            <th data-priority="1">CODIGO</th>
            <th data-priority="2">TIPO DE EXCEPCION</th>
            <th data-priority="3">OPCION DE LA LISTA</th>
           
            <th data-priority="5">FECHA INICIO</th>
            <th data-priority="6">FECHA FIN</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
                        $coneccion = mysqli_connect ("localhost", "root", "" );
                        $basededatos = 'cotel';
                        $bd =mysqli_select_db ($coneccion, $basededatos);

                        $hoy = date("d-m-Y"); 
                        //$hoy= date_create("29-01-2021");
                        echo $hoy;

                        $codigo = " SELECT s.id, s.comentario, u.nombres_usu, u.apellidos_usu, u.codigo_usu, t.nom_tiposolicitud, te.nom_tipoexcepcion, o.nom_opciones, s.fecha_solicitud, s.fechainicio, s.fechafin, s.estado, s.fecharespuesta
                        FROM usuario AS u, solicitud AS s, tiposolicitud AS t, tipoexcepcion AS te, opcioneslista as o
                        WHERE s.estado = '1' AND s.id_usuario = u.id AND s.id_tipoexcepcion = te.id_tipoexcepcion AND s.id_opcioneslista = o.id_opcioneslista  AND  s.id_tiposolicitud = t.id_tiposolicitud AND s.fechainicio!='' and u.id_gerencia='6'";



                        $resultado = mysqli_query($coneccion, $codigo);

                        while ($rest = mysqli_fetch_array($resultado)) {

                            $fechainicio=$rest ['fechainicio'];
                            $fechainicio=$rest ['fechafin'];
                            if($rest ['fechainicio'] != 'no aplica'){
                                //$fechainicio = DateTime::createFromFormat('d/m/Y', $rest ['fechainicio']);
                        // $fechainicio = $rest ['fechainicio']->format("d/m/Y");

                        // $fechainicio = DateTime::createFromFormat("d/m/Y", $rest ['fechainicio']);
                        // $fechainicio = $fechainicio->format('d/m/Y');
                        $date = date_create_from_format('Y-m-d', $rest ['fechainicio']);
                            $fechainicio = date_format($date, 'd-m-Y');
                            $date2 = date_create_from_format('Y-m-d', $rest ['fechafin']);
                            $fechafin = date_format($date2, 'd-m-Y');


                            $fechahoy= strtotime($hoy);
                            $fechaf = strtotime($fechafin);
                            $fechai = strtotime($fechainicio);
                                
                        

                            
                        if( $fechai <= $fechahoy && $fechaf >= $fechahoy ){
                        // if( $fechafin >= $hoy){
                            
        ?>
            <tr>
                <td><?php echo $rest ['nombres_usu']; ?></td>
                    <td><?php echo $rest ['apellidos_usu']; ?></td>
                    <td><?php echo $rest ['codigo_usu']; ?></td>
                    <td><?php echo $rest ['nom_tipoexcepcion']; ?></td>
                    <td><?php echo $rest ['nom_opciones']; ?></td>
                    <td><?php echo $fechainicio; ?></td>
                    <td><?php echo $fechafin; ?></td>
                    
            </tr>

            <!--/Card-->
        <?php
            
        }
            }
            }

        ?>

    </tbody>

</table>


</div>

</div> 

























</div>






    <!--Nav-->




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


