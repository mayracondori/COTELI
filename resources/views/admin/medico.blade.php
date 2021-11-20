@extends('layouts.plantillaadmin')
@section('title','admin')
@section('content')



<!DOCTYPE html>
<html lang="en" class="antialiased">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <!--Replace with your tailwind.css once created-->


       <!--Regular Datatables CSS-->
       <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
       <!--Responsive Extension Datatables CSS-->
       <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">


     </head>

   <body class="bg-gray-100 text-gray-900 ">
<br>

      <!--Container-->
      <div class="container w-full md:w-4/5 xl:w-4/5  mx-auto px-2">

			<!--Title-->
			<h1 class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">
			SOLICITUDES DE BAJA MEDICA PENDIENTES
            </h1>




			<!--Card-->
			 <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">



                <table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">

                    <thead>

						<tr>
							<th data-priority="1">APELLIDO</th>
                            <th data-priority="2">CODIGO</th>
							<th data-priority="3">TIPO DE SOLICITUD</th>
                            <th data-priority="4">FECHA SOLICITUD</th>



                          </tr>
					</thead>

					<tbody>
					<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);

  $codigo = "
  SELECT s.id, u.apellidos_usu, u.codigo_usu, s.fecha_solicitud, s.fechainicio, s.fechafin, s.estado, s.fecharespuesta, t.nom_tiposolicitud FROM usuario AS u, solicitud AS s, tiposolicitud AS t WHERE s.estado = '2' AND s.id_usuario = u.id AND s.id_tiposolicitud = t.id_tiposolicitud AND t.nom_tiposolicitud = 'Baja Medica' ";
$resultado = mysqli_query($coneccion, $codigo);

while ($rest = mysqli_fetch_array($resultado)) {

?>
						<tr>
						<form method="GET" action="{{'medaceptar'}}">
							@csrf							<td><?php echo $rest ['apellidos_usu']; ?></td>
                            <td><?php echo $rest ['codigo_usu']; ?></td>
							<td><?php echo $rest ['nom_tiposolicitud']; ?></td>
							<td><?php echo $rest ['fecha_solicitud']; ?></td>
                            <td ><input type="submit" name="boton" value="VER DETALLE"> </td>
							<input type="hidden" name="codigoempleado" value="<?php echo $rest['codigo_usu']; ?>">

							<input type="hidden" name="id" value="<?php echo $rest['id']; ?>">



							</form>

                        </tr>
					<!--/Card-->
			<?php
		}
        ?>
					</tbody>

				</table>


			</div>



      </div>
      <!--/container-->





	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable( {
					responsive: true
				} )
				.columns.adjust()
				.responsive.recalc();
		} );

	</script>

   </body>
</html>

@endsection

