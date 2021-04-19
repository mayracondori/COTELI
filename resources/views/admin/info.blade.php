@extends('layouts.plantilla')
@section('title','welcome')
@section('content')

<br>
<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
?>
<a href="agre"><button class='bg-blue-400 text-white font-bold py-2 px-4 rounded hover:bg-green-500'>
    Agregar Contenido
</button>
</a>
<a href="lista"><button class='bg-blue-400 text-white font-bold py-2 px-4 rounded hover:bg-green-500'>
    Ver Contenido
</button>
</a>


<?php  $codigo = "SELECT descripcion, titulo, fecha, link FROM informacion WHERE id_tipoinfo='1' order by fecha desc limit 1";
        $resultado = mysqli_query($coneccion, $codigo);
        while ($rest = mysqli_fetch_array($resultado)){
            ?>

<div class="mx-auto max-w-4xl bg-yellow-200 py-5 px-12 lg:px-20 shadow-x2 mb-24">
        <img src="https://pagos.cotel.bo/assets/admin/img/login.png" class="object-center object-scale-down h-64 w-full ">

            <p class="uppercase text-black text-xl text-center font-bold"> <?php echo $rest ['titulo']; ?></p> <br>
            <p class="text-justify"><?php echo $rest ['descripcion']; ?></p>
<br>
            <div class="grid grid-cols-5 divide-x divide-gray-100">
                <div class="text-center">

                </div>
                <div class="text-center">
                    <img src="{{url('/img/prueba.png')}}" width="96" height="156" oncontextmenu="return false"/>
                </div>
                <div class="text-center">
                    <img src="{{url('/img/prueba2.png')}}" width="106" height="166" oncontextmenu="return false"/>
                </div>
              </div>
        <br>
        <p class="text-right"><?php echo $rest ['fecha']; ?></p>

            <div class="text-center">

                ATTE: RECURSOS HUMANOS

          </div>
    </div></div>
    <?php
        }
        ?>
@endsection
