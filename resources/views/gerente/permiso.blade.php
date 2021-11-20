@extends('layouts.plantilla')
@section('title','Permiso')

@section('content')
<?php
$codigo= session('codigo_usu');

?>
<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
?>

<div class="mx-auto max-w-4xl bg-white py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form action="{{route('gerente.solpermiso')}}" method="POST" id="formulario" autocomplete="off">
@csrf
      <div class="bg-yellow-200 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">


        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">FORMULARIO DE EXCEPCIONES PERMISOS</label>

        <img src="{{url('../img/login.png')}}"  class="object-right-top object-scale-down h-16 w-full ">
       <br>
       <?php
            $codigo1 = "select numero_dias from anticipacion where nombretipo='PERMISO'";
            $resultado1 = mysqli_query($coneccion, $codigo1);
            while ($rest1 = mysqli_fetch_array($resultado1)) {

             echo "  LOS PERMISOS SON CON ".$rest1['numero_dias']." DIAS DE ANTICIPACIÓN";
            }
             ?>
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA DE SOLICITUD:
          <script name="fecha_solcitud">
              var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
              var f=new Date();
              document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
          </script></label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:
            <?php  $codigo = "select * from usuario where codigo_usu=$codigo";
            $resultado = mysqli_query($coneccion, $codigo);
            while ($rest = mysqli_fetch_array($resultado)) {
                ?>


            <input type="text" name="codigo" value="<?php echo $rest ['codigo_usu']; ?>">
            <input type="hidden" name="id" value="<?php echo $rest ['id']; ?>">

        </label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE:
            <input type="text"  name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
        </label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">GERENCIA:
            <input type="text"  name="gerencia" value="<?php
            $id=$rest['id'];
             $consulta="SELECT g.nom_gerencia from usuario as u, gerencia as g where u.id = '$id'and g.id_gerencia =u.id_gerencia";
             $gerencia = mysqli_query($coneccion, $consulta);
             while($rest2 = mysqli_fetch_array($gerencia))
             {
             echo $rest2['nom_gerencia'] ;
             }
             ?>"

             >
        </label>

            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DEPARTAMENTO:
                <input type="text"name="departamento" value="<?php
                $id=$rest['id'];
                 $consulta="SELECT d.nom_depto FROM usuario as u, departamento as d where u.id = '$id'and d.id_departamento =u.id_departamento";
                 $gerencia = mysqli_query($coneccion, $consulta);
                 while($rest2 = mysqli_fetch_array($gerencia))
                 {
                 echo $rest2['nom_depto'] ;
                 }
                 ?>"

                 >

            </label>

            <?php
        }
        ?>
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
              PERMISOS
            </label>
            <div class="mt-10 md:flex ">
                <div class="max-w-full flex-row  mb-8 md:mr-2">

                        <input type="radio" id="opcion" name="opcion" value="1" required>
                        <label for="male">Sin goce haber</label><br>
                        <input type="radio" id="female" name="opcion" value="2" required>
                        <label for="female">Cumpleaños</label><br>
                        <input type="radio" id="other" name="opcion" value="3" required>
                        <label for="other">Compensación</label><br>
                        <input type="radio" id="other" name="opcion" value="4" required>
                        <label for="other">Clases varios</label><br>
                        <input type="radio" id="female" name="opcion" value="5" required>
                        <label for="male">Universidad</label><br>
                </div>
                <div class="max-w-full flex-row  mb-8 md:mr-2">

                    <input type="radio" id="female" name="opcion" value="6" required>
                        <label for="female">Seminarios</label><br>
                        <input type="radio" id="other" name="opcion" value="7" required>
                        <label for="other">Matrimonio</label><br>
                        <input type="radio" id="female" name="opcion" value="8" required>
                        <label for="male">Duelo</label><br>
                        <input type="radio" id="female" name="opcion" value="9" required>
                        <label for="female">Lactancia</label><br>
                        <input type="radio" id="other" name="opcion" value="10" required>
                        <label for="other">Consulta medica</label>
                        </div>
            </div>
          </div>

        </div>
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">FECHA INICIO</label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" type="text" id="fechainicio" name="fechainicio"  onkeydown="return false">
            <script>
                    var dateToday = new Date();
                    var dates = $("#fechainicio, #to").datepicker({
                        //defaultDate: "+1w",
                        // changeMonth: true,


                        beforeShowDay: $.datepicker.noWeekends,
                        minDate: "+2D",

                        onSelect: function(selectedDate) {
                            //var option = this.id == "from" ? "minDate" : "maxDate", $.datepicker.noWeekends
                                instance = $(this).data("datepicker"),
                                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                            //dates.not(this).datepicker("option", option, date);
                        }});
            </script>

          </div>
          <div class="md:w-1/2 px-3">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">FECHA FIN</label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" type="text" id="fechafin" name="fechafin" onkeydown="return false" >
            <script>
                    var dateToday = new Date();
                    var dates = $("#fechafin, #to").datepicker({
                        //defaultDate: "+1w",
                        // changeMonth: true,


                        beforeShowDay: $.datepicker.noWeekends,
                        minDate: "+2D",

                        onSelect: function(selectedDate) {
                            //var option = this.id == "from" ? "minDate" : "maxDate", $.datepicker.noWeekends
                                instance = $(this).data("datepicker"),
                                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                            //dates.not(this).datepicker("option", option, date);
                        }});
            </script>
          </div>
        </div>


        <div class="text-center">
            <span class="text-red-500 text-xs italic">
              VERIFIQUE QUE LA FECHA SEA CORRECTA
            </span>
          </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA INICIO</label>
              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" required type="time" id="horainicio" name="horainicio"/>

            </div>
            <div class="md:w-1/2 px-3">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA FIN</label>
              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" required type="time" id="horafin" name="horafin"/>

            </div>
        </div>
        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
            <button type="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              ENVIAR SOLICITUD
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>





  /////////////////



  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" type="text" id="fechainicio" name="fechainicio"/>
  <input type="radio" id="fechainicio" na>
            <script>
                    var dateToday = new Date();
                    var dates = $("#fechainicio, #to").datepicker({
                        //defaultDate: "+1w",
                        // changeMonth: true,


                        beforeShowDay: $.datepicker.noWeekends,
                        minDate: "+3D",

                        onSelect: function(selectedDate) {
                            //var option = this.id == "from" ? "minDate" : "maxDate", $.datepicker.noWeekends
                                instance = $(this).data("datepicker"),
                                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                            //dates.not(this).datepicker("option", option, date);
                        }});
            </script>
@endsection
