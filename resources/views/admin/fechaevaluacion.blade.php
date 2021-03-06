
@extends('layouts.plantillaadmin')
@section('title','EVALUACIONES')
@section('content')

<br><br>

<div class="bg-gray-100 mx-auto max-w-2xl py-5 px-5 sm:px-24 shadow-xl mb-16">
  
    <form method="post" action="{{route('modificarevaluacion')}} " autocomplete="off" >
    @csrf



      <div class="bg-white shadow-md rounded px-8 pt-5 pb-1 mb-4 flex flex-col">
        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">NUEVA FECHA DE EVALUACIÓN </label>
        <div class="mx-16 md:flex mb-6">
          
        <div class="md:w1/2 px-3 mb-6md:mb-0">
        <label for="">Fecha inicio:</label>
            <br>
            <input  name="Fechaini" class=" py-3 px-4 mb-2 w-full bg-gray-200 text-black border border-gray-200 rounded " id="Fechaini" type="date" required>
       </div>
       <BR></BR>
       <div class="md:w1/2 px-3 mb-6md:mb-0">
        <label for="">Fecha fin:</label>
            <br>
            <input  name="Fechafin" class=" py-3 px-4 mb-2 w-full bg-gray-200 text-black border border-gray-200 rounded " id="Fechafin" type="date" required>
       </div>
        </div>
        
            
          </div>
        </div>
        
        <div style="text-align:center" class=" mt-2">
            <div class=" px-3">
            <button type="submit" class="bg-orange-400 text-white hover:bg-yellow-400 font-bold py-2 px-24 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full button">CAMBIAR  </button>
          </div>
        </div>
       
      </div>
    </form>
</div>
<div class="bg-gray-100 mx-auto max-w-2xl py-5 px-5 sm:px-24 shadow-xl mb-16">
  
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                     
        <div class="mx-16 md:flex mb-6">
          <div class="md:w1/2 px-3 mb-6md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
            FECHA ACTUAL DE LA EVALUACIÓN
            </label>
            <BR></BR>
            
    
       </div>
        
        </div>
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    FECHA INICIO
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    FECHA FIN
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                             
                <?php
                $coneccion = mysqli_connect ("localhost", "root", "" );
                $basededatos = 'cotel';
                $bd =mysqli_select_db ($coneccion, $basededatos);

                        $codigo = "select * from bloquepre LIMIT 1 ";
                        $resultado = mysqli_query($coneccion, $codigo);
                        while ($rest = mysqli_fetch_array($resultado)) {
                            ?>

                            <tr>
                               
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap"><?php echo $rest['Fecha_inicio']?></</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap"><?php echo $rest['Fecha_fin']?></</p>
                                </td>
                               
                            </tr>
                            <?php
           }
        ?>
                           
                        </tbody>
                    </table>
                </div>
            </div>

</div>
@endsection