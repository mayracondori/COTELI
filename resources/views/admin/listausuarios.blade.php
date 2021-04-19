@extends('layouts.plantilla')
@section('title','admin')
@section('content')



<!DOCTYPE html>
<html lang="en" class="antialiased">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>USUARIOS </title>
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
      <div class="container w-full md:w-4/5 xl:w-4/5  mx-auto px-2">

			<!--Title-->
			<h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
			LISTA DE USUARIOSsssssssss
            </h1>

			<!--Card-->
			 <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

				<table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>

						<tr>
							<th data-priority="1">APELLIDOS</th>
                            <th data-priority="1">NOMBRES</th>
							<th data-priority="2">CODIGO</th>
							<th data-priority="3">GERENCIA</th>
							<th data-priority="4">DEPARTAMENTO</th>
                            <th data-priority="5">TIPO DE USUARIO</th>



                          </tr>
					</thead>

					<tbody>
					<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);

  $codigo = "
  SELECT u.nombres_usu, u.codigo_usu, u.apellidos_usu, u.id_tipousuario, g.nom_gerencia, d.nom_depto, t.nom_tipousuario FROM usuario AS u, gerencia AS g, departamento AS d, tipousuario AS t WHERE u.id_tipousuario = '3' and u.id_gerencia = g.id_gerencia AND u.id_tipousuario = t.id_tipousuario AND u.id_departamento = d.id_departamento";
$resultado = mysqli_query($coneccion, $codigo);

while ($rest = mysqli_fetch_array($resultado)) {

?>
						<tr>
						<form method="GET" action="{{'formmodificar'}}">
							<td><?php echo $rest ['apellidos_usu']; ?></td>
                            <td><?php echo $rest ['nombres_usu']; ?></td>
							<td><?php echo $rest ['codigo_usu']; ?></td>
							<td><?php echo $rest ['nom_gerencia']; ?></td>
							<td><?php echo $rest ['nom_depto']; ?></td>
                            <td><?php echo $rest ['nom_tipousuario']; ?></td>
							<TD><input type="hidden" name="codigoempleado" value="<?php echo $rest['codigo_usu']; ?>">
							</TD>

							<td ><input type="submit" name="boton" value="MODIFICAR TIPO DE USUARIO"> </td>

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
