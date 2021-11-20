@extends('layouts.plantillaadmin')
@section('title','EVALUACIONES')
@section('content')

<br><br>

    <form method="post" action="{{route('guardarconpr2')}} " autocomplete="off" >
    @csrf


<center>
      <div style="width:1000px"class="bg-white  rounded px-8 pt-5  flex flex-col">
        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">NUEVA EVALUACION</label>
     <label for="">Tipo de Evaluación</label>
        <select class="bg-gray-200 text-black border border-gray-200 py-3" name="Id_tipoeva" id="Id_tipoeva"  style="width:500px;">
                    <?php
                     $coneccion = mysqli_connect ("localhost", "root", "" );
                     $basededatos = 'cotel';
                     $bd =mysqli_select_db ($coneccion, $basededatos);
                  
                 $codigo85 = "select * from tipoevaluacion";
                 $resultado85 = mysqli_query( $coneccion, $codigo85 );
                 echo "<option value='0' selected='selected'>Seleccionar</option>";
                 while( $rest85 = mysqli_fetch_array( $resultado85 ) )
                 { ?>
                 <option value="<?php echo $rest85['Id_tipoeva'];?>"> <?php echo $rest85['Nom_tipoeva'] ;?> </option>

                <?php
                }

                 ?>
                    </select>
              

            <br>
            <input  name="Fechaini" class=" py-3 px-4 mb-2  bg-gray-200 text-black border border-gray-200 rounded " id="Fechaini" type="date"  required>
            <br>
            <input  name="Fechafin" class=" py-3 px-4 mb-2  bg-gray-200 text-black border border-gray-200 rounded " id="Fechafin" type="date"  required>
           
            <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">QUÉ PREGUNTAS ESTARÁN EN SU EVALUACIÓN?</label>
     
            <?php
                
                $codigo = "select * from preguntas where Estado_pre=1";
                $resultado = mysqli_query($coneccion, $codigo);
                while ($rest = mysqli_fetch_array($resultado)) {
                    ?>

                <div class="md:w1/2 px-3 mb-6md:mb-0">
                <input class="py-3 px-4 mb-2"  type="checkbox"  name="<?php echo 'pregunta['.$rest['Id_pre'].']'?>"  value="<?php echo $rest['Id_pre']?>" class="form-checkbox h-5 w-5 text-blue-600" ><span class="ml-2 text-gray-700"><?php echo $rest['Pregunta_pre']?></span>
                </div>
                <?php
                }
                ?>



        </div>
        
        <div style="text-align:center" class=" mt-2">
            <div class=" px-3">
      
            <button type="submit" class=" bg-orange-400 text-white hover:bg-yellow-400 font-bold py-2 px-24 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full button">CREAR EVALUACIÓN</button>
          </div>
        </div>
       
      </div>
    </form>


    </center>
@endsection