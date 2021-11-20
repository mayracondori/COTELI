@extends('layouts.plantillaadmin')
@section('title','EVALUACIONES')
@section('content')


      <!--Container-->
      <div class="container w-full md:w-4/5 xl:w-4/5  mx-auto px-2">

			<!--Title-->
			<h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
			LISTA DE EVALUACIONES REALIZADAS
            </h1>

			<!--Card-->
			 <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

<table id="example" border="2" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>

						<tr>
                        
							<th data-priority="3"> CODIGO DEL EVALUADO</th>
							<th data-priority="4">EVALUADOR</th>
                            <th data-priority="1">FECHA DE EVALUACIÓN</th>
							<th data-priority="2">VALOR</th>
                            <th>VER </th>
                            <th></th>
                          </tr>
					</thead>

					<tbody>
                    <?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);

  $codigo = "SELECT e.Fecha_eva,e.Id_eva, u.nombres_usu, u.apellidos_usu, e.Codigo_evaluado,e.Valor_evaluacion
  FROM evaluacion as e,usuario as u
  WHERE e.Id_usu=u.id and e.Valor_evaluacion>0";
 
$resultado = mysqli_query($coneccion, $codigo);

while ($rest = mysqli_fetch_array($resultado)) {
   
?>
								<tr>
						<form method="POST" action="{{'verevaluacion'}}">
						@csrf
                       
	
                        <td><?php echo $rest ['Codigo_evaluado']; ?></td>
                        	<td><?php echo $rest ['nombres_usu']." ".$rest ['apellidos_usu']; ?></td>
                            <td><?php echo $rest ['Fecha_eva']; ?></td>
							<td><?php echo $rest ['Valor_evaluacion'];?></td>
							</TD>
                             <td ><input type="submit" name="boton" value="VER"> </td>

                    	    <TD><input type="hidden" name="Id_eva" value="<?php echo $rest['Id_eva']; ?>">
                            
							</form>

                        </tr>
        <?php
		}
        ?>
					<!--/Card-->
		
					</tbody>
				</table>
</div>
</div>
@endsection