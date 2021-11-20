@extends('layouts.plantillausuario')
@section('title','admin')
@section('content')
<?php
$codigo= session('codigo_usu');

?>
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



      <!--Container-->
      <div class="container w-full md:w-4/5 xl:w-4/5  mx-auto px-2">

			<!--Title-->

                </div>
                <div class="text-center">
                    <p class="text-2xl text-purple-700 text-opacity-75">SOLICITUDES </p><br>

                </div>


			<!--Card-->
			 <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


				<table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>

						<tr>
                            <th data-priority="1">FECHA DE SOLICITUD</th>
                            <th data-priority="2">FECHA RESPUESTA</th>
                            <th data-priority="3">TIPO SOLICITUD</th>
							<th data-priority="4">OPCION DE LA LISTA</th>
                            <th data-priority="5">FECHA INICIO</th>
                            <th data-priority="6">FECHA FIN</th>
                            <th data-priority="7">HORA INICIO</th>
                            <th data-priority="8">HORA FIN</th>
                            <th data-priority="9">ESTADO</th>
                            <th data-priority="10">COMENTARIO</th>
                            <th data-priority="10">ACEPTADO POR</th>

                          </tr>
					</thead>

					<tbody>
					<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);

  $codigo = "SELECT s.id, s.fecharespuesta, s.comentario, u.nombres_usu, t.nom_tiposolicitud, te.nom_tipoexcepcion, o.nom_opciones, s.fecha_solicitud, s.historial_remitentes, s.fechainicio, s.fechafin, s.horainicio, s.horafin, s.estado
FROM usuario AS u, solicitud AS s, tiposolicitud AS t, tipoexcepcion AS te, opcioneslista AS o
WHERE s.id_usuario = u.id
AND s.id_tipoexcepcion = te.id_tipoexcepcion AND s.id_opcioneslista = o.id_opcioneslista AND s.id_tiposolicitud = t.id_tiposolicitud and u.codigo_usu=$codigo ORDER BY s.fecha_solicitud Desc";
$resultado = mysqli_query($coneccion, $codigo);

while ($rest = mysqli_fetch_array($resultado)) {

?>
						<tr>
                            <td><?php echo $rest ['fecha_solicitud']; ?></td>
                            <td><?php echo $rest ['fecharespuesta']; ?></td>
							<td><?php echo $rest ['nom_tiposolicitud']; ?></td>
							<td><?php echo $rest ['nom_opciones']; ?></td>
                            <td><?php echo $rest ['fechainicio']; ?></td>
                            <td><?php echo $rest ['fechafin']; ?></td>
                            <td><?php echo $rest ['horainicio']; ?></td>
                            <td><?php echo $rest ['horafin']; ?></td>

                            <td><?php
                             $aux=$rest ['estado'];
                             $nom='';
                             if($aux==1){
                                 $nom='Aceptado';
                             }else{
                                 if($aux==0){
                                     $nom='Negado';
                                 }else{

                                        $nom='Pendiente';


                                 }
                             }
                             echo $nom;
                             ?></td>
                             <td><?php echo $rest ['comentario']; ?></td>
                             <td><?php echo $rest ['historial_remitentes']; ?></td>


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
</html>

@endsection
