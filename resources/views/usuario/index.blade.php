@extends('layouts.plantillausuario')
@section('title','usuario')

@section('content')
<?php
$codigo= session('codigo_usu');


?>
<br>
    <div class="flex content-around flex-wrap bg-gray-200 h-24">
        <div class="container mx-auto mt-2 space-x-0">
           <!-- <a href="usuario/aceptadas">
                <button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
                    Aceptadas
                </button>
            </a>
            <a href="usuario/pendientes">
                <button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
                    Pendientes
                </button>
            </a>
            <a href="usuario/rechazadas">
                <button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
                    Rechazadas
                </button>
            </a>  
            <a href="usuario/rechazadas">
                <button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
                    Solicitudes
                </button>
            </a>
            <a href="usuario/info">
                <button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
                    Avisos
                </button>
            </a>
            <a href="usuario/pendientes">
                <button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
                    Formal
                </button>
            </a>
            <a href="usuario/poraprobar">
                <button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
                   Solicitudes pendientes
                </button>
            </a>
            <a href="usuario/miscertificados">
                <button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
                  MIS CERTIFICADOS 
                </button>
            </a>
            <a href="usuario/calendario">
                <button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
                  MI CALENDARIO
                </button>
            </a>
            <a href="usuario/evaluacion"><button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
            Evaluacion de 180??
    </button>
    </a>
    <a href="usuario/evaluaciongerente"><button class='bg-blue-300 text-white font-bold py-2 px-4 rounded hover:bg-blue-800'>
            Evaluacion de 360??
    </button>
    </a>-->
        </div>
    </div>
    
<div class="container mx-auto">




      <br> <br>
      <br>

    <section class="mr-16 ml-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16">
            <a href="usuario/formulario">
                 <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">FORMULARIO DE EXCEPCIONES
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                      </svg>
                 </div>
            </a>
            <a href="usuario/boleta">
                <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">SOLICITUD BOLETA DE PAGO
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                        <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
            <a href="usuario/trabajo">
                <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">SOLICITUD DE CERTIFICADOS
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                      </svg>
                </div>
            </a>
            <a href="usuario/medico">
                <div class="bg-yellow-500 sm:bg-yellow-400 hover:bg-orage-400 text-white font-bold py-2 px-4 rounded">
                    <h1 class="text-center">SOLICITUD BAJA MEDICA
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
        </div>

    </section>


    <a href="intent://send/+59167208815#Intent;scheme=+59169755363;package=com.whatsapp;action=android.intent.action.SENDTO;end" style="font-size:20px;padding:5px 12px;border-radius:5px;background-color:#189D0E;color:white;text-shadow:none;"> ?????? Mensaje de WhatsApp </a>


</div>
<br><br>
@endsection
