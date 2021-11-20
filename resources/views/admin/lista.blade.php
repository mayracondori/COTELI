@extends('layouts.plantillaadmin')
@section('title','welcome')
@section('content')


<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
?>

	<div class="mx-auto max-w-4xl" >
		<table class="w-full flex flex-row  flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
			<thead class="text-white">
				<tr class="bg-orange-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
					<th class="p-3 text-center">Titulo</th>
                    <th class="p-3 text-center">Descripción</th>
                    <th class="p-3 text-center">Link</th>
                    <th class="p-3 text-center">Fecha</th>
                    <th class="p-3 text-center">Eliminar</th>
				</tr>


            </thead>

            <?php  $codigo = "SELECT descripcion, titulo, fecha, link FROM informacion WHERE id_tipoinfo!='1' order by fecha desc";
        $resultado = mysqli_query($coneccion, $codigo);
        while ($rest = mysqli_fetch_array($resultado)){
            ?>



			<tbody class="flex-1 sm:flex-none">

				<tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
					<td class="border-grey-light border hover:bg-gray-100 p-3 "><?php echo $rest['titulo'] ;?></td>
					<td class="border-grey-light border hover:bg-gray-100 p-3 "><?php echo $rest['descripcion'] ;?> </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 "><a href="<?php echo $rest['link'] ;?> " target="_blank"> <p class="text-blue-500"> INGRESAR A LINK</p></td></a>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 "><?php echo $rest['fecha'] ;?></td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 "> <p class="text-red-500"> Quitar </p></td>
                </tr>

            </tbody>
            <?php
           }

            ?>
		</table>
	</div>
</body>

<style>
  html,
  body {
    height: 100%;
  }

  @media (min-width: 640px) {
    table {
      display: inline-table !important;
    }

    thead tr:not(:first-child) {
      display: none;
    }
  }

  td:not(:last-child) {
    border-bottom: 0;
  }

  th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, .1);
  }
</style>

@endsection