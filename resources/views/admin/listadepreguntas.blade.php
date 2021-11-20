@extends('layouts.plantillaadmin')
@section('title','EVALUACIONES')
@section('content')


      <!--Container-->
      <div class="container w-full md:w-4/5 xl:w-4/5  mx-auto px-2">

			<!--Title-->
			<h1 class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">
			LISTA DE PREGUNTAS
            </h1>

			<!--Card-->
			 <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

<table id="example" border="2" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>

						<tr>
                        
							<th data-priority="3">TITULO</th>
							<th data-priority="4">PREGUNTA</th>
                            <th data-priority="1">BLOQUE</th>
							<th data-priority="2">ESTADO</th>
                            <th>MODIFICAR</th>
                            <th></th>
                          </tr>
					</thead>

					<tbody>
                    <?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);

  $codigo = "SELECT p.Id_pre,p.Pregunta_pre,b.Nom_bloque,p.Estado_pre,p.Titulo_pre
  FROM preguntas as p , bloquepre as b 
  WHERE p.Id_bloque=b.Id_bloque ORDER BY 
  p.Id_bloque ASC";
  $estado="";
$resultado = mysqli_query($coneccion, $codigo);

while ($rest = mysqli_fetch_array($resultado)) {
    if($rest['Estado_pre']==1){
        $estado="HABILITADA";
    }else{
        $estado="DESHABILITADA";
    }

?>
								<tr>
						<form method="POST" action="{{'modifpreguntas'}}">
						@csrf
                       
	
                        <td><?php echo $rest ['Titulo_pre']; ?></td>
                        	<td><?php echo $rest ['Pregunta_pre']; ?></td>
                            <td><?php echo $rest ['Nom_bloque']; ?></td>
							
							</TD>
                    <?php
                    if($estado=="HABILITADA"){
                    ?>
                    <td style="background-color:#00ff00"></td>
                    <td ><input  type="submit" name="boton" value="DESHABILITAR"> </td>

                    <?php
                    }else{
                    ?>
                    <td style="background-color:#ff1a1a"></td>
                    <td ><input type="submit" name="boton" value="HABILITAR"> </td>
                    <?php
                    }
                    ?>
                    	
							<TD><input type="hidden" name="Id_pre" value="<?php echo $rest['Id_pre']; ?>">
                            
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