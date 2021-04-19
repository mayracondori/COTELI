@extends('layouts.plantilla')
@section('title','MENU DE SOLICITUDES')

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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                    </svg>
                 </div>
            </a>
            <a href="vacaciones">
                <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">VACACIONES
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                        <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
            <a href="comisiones">
                <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">COMISIONES
                    </h1>
                        <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                </div>
            </a>

        </div>

    </section>
</div>
<br><br><br><br><br><br><br>
@endsection
