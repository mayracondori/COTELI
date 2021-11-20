@extends('layouts.plantillaadmin')
@section('title','admin')
@section('content')
<br>
<br>
<br>
<br>


<div class="mx-auto max-w-4xl bg-white py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form>

      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">

        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">FORMULARIO DE </label>

        <img src="{{url('../img/login.png')}}"  class="object-right-top object-scale-down h-16 w-full ">
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA DE SOLICITUD:
          <script>
              var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
              var f=new Date();
              document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
          </script></label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:
        </label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE:

        </label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">GERENCIA:
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DEPARTAMENTO:</label>
        </label>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
              PERMISOS
            </label>

            <select name="cars" id="cars">
                <option value="volvo">Sin goce de haber</option>
                <option value="saab">cumpleaños</option>
                <option value="mercedes">compensación</option>
                <option value="audi">clases varios</option>
                <option value="saab">universidad</option>
                <option value="mercedes">Seminario</option>
                <option value="audi">Matrimonio</option>
                <option value="saab">Duelo</option>
                <option value="mercedes">Lactancia</option>
                <option value="audi">Consulta medica</option>
              </select>
          </div>

        </div>
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
              DE FECHA
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="company" type="date" placeholder="Netboard">
            <div class="text-center">
              <span class="text-red-500 text-xs italic">
                VERIFIQUE QUE LA FECHA SEA CORRECTA
              </span>
            </div>
          </div>
          <div class="md:w-1/2 px-3">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
              A FECHA
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title" type="date" placeholder="Software Engineer">
          </div>
        </div>

        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
            <button class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              ACEPTAR SOLICITUD
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>




<br>
<br>
<br>
<br>
@endsection
