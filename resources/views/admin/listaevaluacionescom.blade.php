@extends('layouts.plantillaadmin')
@section('title','EVALUACIONES')
@section('content')


      <!--Container-->
      <div class="container w-full md:w-4/5 xl:w-4/5  mx-auto px-2">

			<!--Title-->
			<h1 class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">
			LISTA DE EVALUACIONES
            </h1>

			<!--Card-->
			 <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

<table id="example" border="2" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>

						<tr>
                        
							<th data-priority="3">TIPOEVALUACION</th>
							<th data-priority="4">FECHAINI</th>
                            <th data-priority="1">FECHAFIN</th>
                            <th>VER PREGUNTAS</th>
                            <th></th>
                          </tr>
					</thead>

					<tbody>
                    <?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);

  $codigo = "SELECT e.Id_evacom, e.Fechaini, e.Fechafin, t.Nom_tipoeva from evaluaciones as e, tipoevaluacion as t where e.Id_tipoeva = t.Id_tipoeva ";
  $estado="";
$resultado = mysqli_query($coneccion, $codigo);

while ($rest = mysqli_fetch_array($resultado)) {

?>
								<tr>
						<form method="GET" action="{{'mostrarlistadepreguntas'}}">
						@csrf
                       
	
                        <td><?php echo $rest ['Nom_tipoeva']; ?></td>
                        	<td><?php echo $rest ['Fechaini']; ?></td>
                            <td><?php echo $rest ['Fechafin']; ?></td>
							
							</TD>
                    <td ><input  type="submit" name="boton" value="VER PREGUNTAS"> </td>

                   
                    	
							<TD><input type="hidden" name="Id_evacom" value="<?php echo $rest['Id_evacom']; ?>">
                            
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