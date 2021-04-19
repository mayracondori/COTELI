@extends('layouts.plantilla')
@section('title','welcome')
@section('content')
<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
?>
<div class="mx-auto max-w-4xl" >

<table class="mx-auto max-w-3xl ">
    <thead>
        <tr class="bg-teal-400">
            <th style="background:#2ae7e7" class="p-3 font-bold uppercase text-white border hidden lg:table-cell">TITULO</th>
            <th style="background:#2ae7e7"class="p-3 font-bold uppercase text-white border hidden lg:table-cell">DESCRIPCION</th>
            <th style="background:#2ae7e7"class="p-3 font-bold uppercase text-white border hidden lg:table-cell">LINK</th>
            <th style="background:#2ae7e7" class="p-3 font-bold uppercase text-white border hidden lg:table-cell">FECHA</th>
        </tr>
    </thead>
    <tbody>
    <?php  $codigo = "SELECT descripcion, titulo, fecha, link FROM informacion WHERE id_tipoinfo!='1' order by fecha desc";
        $resultado = mysqli_query($coneccion, $codigo);
        while ($rest = mysqli_fetch_array($resultado)){
            ?>
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">

            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-teal-400 px-2 py-1  uppercase">TITULO</span> <br>
                <p> <?php echo $rest['titulo'] ;?></p>
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-teal-400 px-2 py-1  uppercase">DESCRIPCION</span><br>
            <p> <?php echo $rest['descripcion'] ;?></p>
            </td>
          	<td class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-teal-400 uppercase">LINK</span><br>
                <p> <a href="<?php echo $rest['link'] ;?> " target="_blank"> <p style="color:#00008b" > INGRESAR AL LINK</p></p>
          	</td>
            <td class="w-full lg:w-auto p-3 text-gray-900 border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-teal-400 uppercase">FECHA</span><br>
                <p> <?php echo $rest['fecha'] ;?></p>

            </td>

        </tr>
        <?php
           }

            ?>
    </tbody>
</table>


</div>

<script type="text/javascript" language="Javascript">
    document.oncontextmenu = function(){return false}
    </script>
@endsection
