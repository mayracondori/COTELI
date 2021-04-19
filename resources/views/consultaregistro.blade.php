
@extends('layouts.plantilla')
@section('title','REGISTRO')
@section('content')

<br><br>
<div class="bg-gray-100 mx-auto max-w-2xl py-5 px-5 sm:px-24 shadow-xl mb-16">
    <form method="post" action="{{route('/completaregistro')}} " autocomplete="off" >
    @csrf



      <div class="bg-white shadow-md rounded px-8 pt-5 pb-1 mb-4 flex flex-col">
        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">INICIA TU REGISTRO</label>
        <div class="mx-16 md:flex mb-6">
          <div class="md:w1/2 px-3 mb-6md:mb-0">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
              Código
            </label>
            <input  name="codigo_usu" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-2" id="codigo" type="number" placeholder="Código de empleado" required>


          </div>
        </div>
        <div class="mx-16 md:flex mb-6">
          <div class="md:w1/2 px-3 mb-6md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
              Numero de carnet
            </label>
            <input name ="carnet" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-1" id="contraseña" type="number" placeholder="Numero de carnet" required>

          </div>
        </div>
        <div class="-mx-2 md:flex mt-2">
            <div class="md:w-full px-3">
            <button type="submit" class="md:w-full bg-yellow-400 text-white hover:bg-green-400 font-bold py-2 px-24 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full button">INICIAR</button>
          </div>
        </div>
       
      </div>
    </form>
  </div>



@endsection