@extends('layouts.plantilla')
@section('title','FERIADOS')
@section('content')

<div class="container mx-auto">
    <h1 class="text-yellow-800 font-bold text-3xl text-center">FERIADOS EN ESTE AÑO</h1>
    <br>
   
<div class="content">

<Label style=" margin-left: 400px;">Los feriados no serán tomados en cuenta entre los días hábiles </Label>


<a href="feriadonuevo"> <button style=" margin-left: 550px;" class='bg-blue-400 text-white font-bold py-2 px-4 rounded hover:bg-green-500'>Crear feriado</button> </a>

<h4 class="text-yellow-800 font-bold text-3xl text-center">FERIADOS HABILITADOS</h4>
<table id="example" class=" text-center stripe hover" style=" margin-left: 300px; width:50%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>

        <tr>
            <th data-priority="1">FECHA</th>
            <th data-priority="1">DESCRIPCION</th>
            <th data-priority="1">EDITAR</th>
            
            
        </tr>
    </thead>

    <tbody>
    
   
        <?php
                        $coneccion = mysqli_connect ("localhost", "root", "" );
                        $basededatos = 'cotel';
                        $bd =mysqli_select_db ($coneccion, $basededatos);
                        $codigo = " SELECT * FROM feriados 
                        WHERE estado ='1'";

                        $resultado = mysqli_query($coneccion, $codigo);

                        while ($rest = mysqli_fetch_array($resultado)) {

                           
        ?> <tr>
            <form method="GET" action="{{'detalleferiado'}}">
          
            <td><?php echo $rest ['Fecha']; ?></td>
                    <td><?php echo $rest ['Descripcion']; ?></td>
                    <td><input type="hidden" id="id" name="id" value="<?php echo $rest['id']; ?>"></td>
                    <td ><input type="submit" name="boton" value="EDITAR"> </td>
      <!--/Card-->
           
             </form>
            </tr>
      <?php
            
        }
            
        ?>
                   

      

    </tbody>

</table>
<h4 class="text-yellow-800 font-bold text-3xl text-center">FERIADOS INHABILITADOS</h4>
<table id="example" class=" text-center stripe hover" style=" margin-left: 300px; width:50%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>

        <tr>
        
            <th data-priority="1">FECHA</th>
            <th data-priority="1">DESCRIPCION</th>
            <th data-priority="1">EDITAR</th>
            
            
        </tr>
    </thead>

    <tbody>
        <?php
                        $coneccion = mysqli_connect ("localhost", "root", "" );
                        $basededatos = 'cotel';
                        $bd =mysqli_select_db ($coneccion, $basededatos);
                        $codigo = " SELECT * FROM feriados 
                        WHERE estado ='0'";

                        $resultado1 = mysqli_query($coneccion, $codigo);

                        while ($rest = mysqli_fetch_array($resultado1)) {

                           
        ?>
            <tr>
                     <form method="GET" action="{{'detalleferiado'}}">
                    
                    <td><?php echo $rest ['Fecha']; ?></td>
                    <td><?php echo $rest ['Descripcion']; ?></td>
                    <td><input type="hidden" id="id" name="id" value="<?php echo $rest['id']; ?>"></td>
                    <td ><input type="submit" name="boton" value="EDITAR"> </td>
                   
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


@endsection

