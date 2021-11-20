@extends('layouts.plantillausuario')
@section('title','usuario')

@section('content')
<br><br><br><br><br>
<br>
<br>
<div class="container mx-auto">
    <section class="mr-16 ml-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16">
            <a href="permiso">
                 <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">PERMISOS
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                      </svg>
                 </div>
            </a>
            <a href="vacaciones">
                <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">VACACIONES
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                      </svg>
                </div>
            </a>
            <a href="comisiones">
                <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">COMISIONES
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                      </svg>
                </div>
            </a>

        </div>

    </section>
</div>
<br><br><br><br><br><br><br>
@endsection
