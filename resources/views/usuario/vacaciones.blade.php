@extends('layouts.plantillausuario')
@section('title','usuario')

@section('content')
@inject('Gerencias','App\Services\Gerencias')


<?php
$codigo= session('codigo_usu');

?>
<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
?>
<div class="mx-auto max-w-4xl bg-white py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form action="{{route('usuario.solvacaciones')}}" method="POST" autocomplete="off">
@csrf
      <div class="bg-yellow-200 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">

        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">FORMULARIO DE EXCEPCIONES VACACIONES</label>
        <div class="text-center">
            <span class="text-red-500 text-xs italic">
            <?php
            $codigo1 = "select numero_dias from anticipacion where nombretipo='VACACIONES'";
            $resultado1 = mysqli_query($coneccion, $codigo1);
            while ($rest1 = mysqli_fetch_array($resultado1)) {

             echo "  LAS VACACIONES SON CON ".$rest1['numero_dias']." DIAS DE ANTICIPACIÓN";
            }
             ?>
            </span>
        </div>
        <img src="{{url('../img/login.png')}}"  class="object-right-top object-scale-down h-16 w-full ">
        <table>
      <tr><td>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA DE SOLICITUD:
         
         </td>
         
         <td>
            <script name="fecha_solicitud">
                 var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                 var f=new Date();
                 document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
             </script></label></td>
          </tr>
          <tr>
          <td>
           <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:
               <?php  $codigo = "select * from usuario where codigo_usu=$codigo";
               $resultado = mysqli_query($coneccion, $codigo);
               while ($rest = mysqli_fetch_array($resultado)) {
                   ?>
   
   </td>
   <td>
               <input type="text"  name="codigo" value="<?php echo $rest ['codigo_usu']; ?>">
               <input type="hidden" name="id" value="<?php echo $rest ['id']; ?>">
               </td>
           </label>
           </tr>
           <tr>
           <td>
           <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE:
             </td>
             <td>
                 <input type="text" style="width : 200px;" name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
                 </td></label>
          </tr>
          <tr>
          <td>
           <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">GERENCIA:
             </td>
             <td>  <input type=»text» name="gerencia" value="<?php
               $id=$rest['id'];
                $consulta="SELECT g.nom_gerencia from usuario as u, gerencia as g where u.id= '$id'and g.id_gerencia =u.id_gerencia";
                $gerencia = mysqli_query($coneccion, $consulta);
                while($rest2 = mysqli_fetch_array($gerencia))
                {
                echo $rest2['nom_gerencia'] ;
                }
                ?>"
   
                >
           </label></td>  
   </tr><tr>
   <td>
               <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DEPARTAMENTO:
                 </td>      
                 <td>  <input type="text"  name="departamento" value="<?php
   
                   $id=$rest['id'];
                    $consulta="SELECT d.nom_depto FROM usuario as u, departamento as d where u.id= '$id'and d.id_departamento =u.id_departamento";
                    $gerencia = mysqli_query($coneccion, $consulta);
                    while($rest2 = mysqli_fetch_array($gerencia))
                    {
                    echo $rest2['nom_depto'] ;
                    }
                    ?>"
   
                    >
   
               </label>
               </td> 
               </table>
               <?php
           }
           ?>
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
              VACACIONES
            </label><br>
            <input type="radio" id="opcion" name="opvacaciones" value="11" required>
            <label for="male">Vacación</label><br>
            <input type="radio" id="female" name="opvacaciones" value="12" required>
            <label for="female">A cuenta Vacación</label><br>
            <input type="radio" id="other" name="opvacaciones" value="13" required>
            <label for="other">Otros</label>
          </div>

        </div>
        <div class="text-center">
            <span class="text-red-500 text-xs italic">
              VERIFIQUE QUE LA FECHA SEA CORRECTA
            </span>
          </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">FECHA INICIO</label>
              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" required type="text" id="fechainicio" name="fechainicio" onkeydown="return false" >
              <script>
                      var dateToday = new Date();
                      var dates = $("#fechainicio, #to").datepicker({
                          //defaultDate: "+1w",
                          // changeMonth: true,


                          beforeShowDay: $.datepicker.noWeekends,
                          minDate: "+15D",
                          //maxDate: "+20D",

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
              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" required type="text" id="fechafin" name="fechafin" onkeydown="return false" >
              <script>
                      var dateToday = new Date();
                      var dates = $("#fechafin, #to").datepicker({
                          //defaultDate: "+1w",
                          // changeMonth: true,


                          beforeShowDay: $.datepicker.noWeekends,
                          minDate: "+15D",

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
              VERIFIQUE QUE EL REMITENTE SEA EL CORRECTO
            </span>
          </div>
          <div class="text-center">
            <span class="text-xs italic font-bold mb-2">
             USUARIO REMITENTE
            </span>
          </div>
          <div class="-mx-3 md:flex mb-6">

          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
              CODIGO:
              </label>

              <input required type="text" name= "gerencia" id="gerencia">
              </div>
              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                  NOMBRE DEL USUARIO:


              <select required name="departamento" id="departamento">


              </select>
              </label>
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
@endsection
@section('script')
<script>
$(document).ready(function(){
  function loadDepartamento(){

          var id_gerencia =$('#gerencia').val();

              $.get('departamentos',{id_gerencia: id_gerencia},function(departamentos){
                var old = $('#departamento').data('old') != '' ? $('#departamento').data('old') : '';
              $('#departamento').empty();
             // $('#departamento').append( "<option value=''>El usuario es: </option>");
              $.each(departamentos,function(index,value){
                $('#departamento').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");

              })
              });


    }
    loadDepartamento();
    $('#gerencia').on('change',loadDepartamento);
    $('#gerencia').on('keyup',loadDepartamento);
});


</script>
@endsection
