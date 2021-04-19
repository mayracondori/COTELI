@extends('layouts.plantilla')
@section('title','welcome')
@section('content')
<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
?>
<br>
<div class="bg-gray-400 mx-auto max-w-4xl py-5 px-5 sm:px-24 shadow-xl mb-16">
    <form action="{{route('admin.regis')}}" method="post" autocomplete="off">
        @csrf

            <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">
                AGREGAR CONTENIDO</label>
            <div class="mx-16 md:flex mb-6">
              <div class="md:w1/2 px-3 mb-6md:mb-0">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                  TIPO
                </label> <br>
                <select class="bg-gray-200 text-black border border-gray-200 py-3" name="tipo" id="tipo" size="1" style="width:100px;">
                    <?php
                 $codigo = "select * from tipoinfo";
                 $resultado = mysqli_query( $coneccion, $codigo );
                 echo "<option value='0' selected='selected'>Seleccionar</option>";
                 while( $rest = mysqli_fetch_array( $resultado ) )
                 { ?>
                 <option value="<?php echo $rest['id_tipoinfo'];?>"> <?php echo $rest['nom_tipoinfo'] ;?> </option>

                <?php
                }

                 ?>
                    </select>
              </div>
            </div>
            <div class="mx-16 md:flex mb-6">
              <div class="md:w1/2 px-3 mb-6md:mb-0">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                  TITULO
                </label>
                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-12 mb-1" id="titulo" name="titulo" type="text" placeholder="Titulo" required>
              </div>
            </div>
            <div class="mx-16 md:flex mb-6">
                <div class="md:w1/2 px-3 mb-6md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                    DESCRIPCION
                  </label> <br>
                  <pre><textarea class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-12 mb-1" name="descripcion"  id="descripcion" name="descripcion" placeholder="Descripcion o cuerpo del comunicado" cols="75" rows="5"></textarea></pre>
                </div>
              </div>
              <div class="mx-16 md:flex mb-6">
                <div class="md:w1/2 px-3 mb-6md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                    LINK
                  </label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-32 mb-1" id="link" name="link" type="text" placeholder="Link">
                </div>
              </div>

            <div class="-mx-3 md:flex mt-2">
                <div class="md:w-full px-3">
                <button type="submit" class="md:w-full bg-yellow-400 text-white hover:bg-green-400 font-bold py-2 px-32 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                  REGISTRAR
                </button>
              </div>
            </div>

        </form>
      </div>
@endsection
