@extends('layouts.plantilla')
@section('title','usuario')

@section('content')
<?php
$codigo= session('codigo_usu');


?>
<br>

<div class="container mx-auto">




      <br> <br>
      <br>

    <section class="mr-16 ml-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16">
            <a href="conta/respondidas">
                 <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">RESPONDIDAS
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                      </svg>
                 </div>
            </a>
            <a href="conta/pendientes">
                <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">PENDIENTES
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                        <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </a>

        </div>

    </section>
</div>
<br><br>
@endsection
