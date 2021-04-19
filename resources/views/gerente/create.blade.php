@extends('layouts.plantilla')
@section('title','usuario')

@section('content')
    <div class="mx-auto max-w-2xl py-5 px-5 sm:px-24 shadow-xl mb-32">
        <form>
          <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">Iniciar sesión</label>
            <div class="mx-16 md:flex mb-6">
              <div class="md:w1/2 px-3 mb-6md:mb-0">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                  Código
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-1" id="codigo" type="number" placeholder="Código" required>
              </div>
            </div>
            <div class="mx-16 md:flex mb-6">
              <div class="md:w1/2 px-3 mb-6md:mb-0">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                  Contreña
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-1" id="contraseña" type="password" placeholder="Contraseña" required>
              </div>
            </div>
            <div class="-mx-3 md:flex mt-2">
                <div class="md:w-full px-3">
                <button class="md:w-full bg-yellow-400 text-white hover:bg-green-400 font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                  Iniciar sesión
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
@endsection


