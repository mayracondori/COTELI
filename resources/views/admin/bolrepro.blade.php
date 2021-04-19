@extends('layouts.plantilla')
@section('title','admin')
@section('content')

<!DOCTYPE html>
<html lang="en" class="antialiased">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>SOLICITUDES DE EXCEPCIÓN APROBADAS </title>
      <meta name="description" content="">
      <meta name="keywords" content="">
      <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
	  <!--Replace with your tailwind.css once created-->


	 <!--Regular Datatables CSS-->
	 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">


   </head>

   <body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">


      <!--Container-->
      <div class="container w-full md:w-3/5 xl:w-3/5  mx-auto px-2">

			<!--Title-->
			<h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
			SOLICITUDES BOLETAS DE PAGO APROBADAS
            </h1>




			<!--Card-->
			 <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


				<table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>

						<tr>
							<th data-priority="1">APELLIDOS</th>
                            <th data-priority="2">CODIGO</th>
							<th data-priority="3">FECHA DE SOLICITUD</th>
                            <th data-priority="4">FECHA DE RESPUESTA</th>
                            <th data-priority="5">FECHA DE RESPUESTA</th>
						</tr>
					</thead>

					<tbody>
					<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);

  $codigo = "SELECT s.id, u.apellidos_usu, u.codigo_usu, t.nom_tiposolicitud, te.nom_tipoexcepcion, o.nom_opciones, s.fecha_solicitud, s.comentario, s.fechafin, s.estado, s.fecharespuesta FROM usuario AS u, solicitud AS s, tiposolicitud AS t, tipoexcepcion AS te, opcioneslista AS o WHERE s.estado = '0' AND s.id_usuario = u.id AND s.id_tipoexcepcion = te.id_tipoexcepcion AND s.id_opcioneslista = o.id_opcioneslista AND s.id_tiposolicitud = t.id_tiposolicitud AND s.destino='0' AND t.nom_tiposolicitud = 'Boleta de pago'";
$resultado = mysqli_query($coneccion, $codigo);

while ($rest = mysqli_fetch_array($resultado)) {

?>
						<tr>
							<td><?php echo $rest ['apellidos_usu']; ?></td>
                            <td><?php echo $rest ['codigo_usu']; ?></td>
							<td><?php echo $rest ['fecha_solicitud']; ?></td>
                            <td><?php echo $rest ['fecharespuesta']; ?></td>
                            <td><?php echo $rest ['comentario']; ?></td>
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
