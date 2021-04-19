@extends('layouts.plantilla')
@section('title','usuario')

@section('content')

<?php
$codigo= session('codigo_usu');


?>
<?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
?>

<div class="mx-auto max-w-4xl bg-yellow-100 py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form enctype="multipart/form-data" action="{{route('usuario.solpermiso')}}" method="POST" id="formulario" autocomplete="off">
@csrf
      <div class="bg-yellow-200 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">


        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">FORMULARIO DE EXCEPCIONES PERMISOS</label>
        <div class="text-center">
            <span class="text-red-500 text-xs italic">
            <?php
            $codigo1 = "select numero_dias from anticipacion where nombretipo='PERMISO'";
            $resultado1 = mysqli_query($coneccion, $codigo1);
            while ($rest1 = mysqli_fetch_array($resultado1)) {

             echo "  LOS PERMISOS SON CON ".$rest1['numero_dias']." DIAS DE ANTICIPACIÓN";
            }
             ?>
            </span>
          </div>
        <img src="https://pagos.cotel.bo/assets/admin/img/login.png" class="object-right-top object-scale-down h-16 w-full ">
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA DE SOLICITUD:
          <script name="fecha_solicitud">
              var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
              var f=new Date();
              document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
          </script></label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:
            <?php  $codigo = "select * from usuario where codigo_usu=$codigo";
            $resultado = mysqli_query($coneccion, $codigo);
            while ($rest = mysqli_fetch_array($resultado)) {
                ?>


            <input type="text"  name="codigo" value="<?php echo $rest ['codigo_usu']; ?>">
            <input type="hidden" name="id" value="<?php echo $rest ['id']; ?>">

        </label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE:
            <input type="text" style="width : 200px;" name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
        </label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">GERENCIA:
            <input type=»text» name="gerencia" value="<?php
            $id=$rest['id'];
             $consulta="SELECT g.nom_gerencia from usuario as u, gerencia as g where u.id= '$id'and g.id_gerencia =u.id_gerencia";
             $gerencia = mysqli_query($coneccion, $consulta);
             while($rest2 = mysqli_fetch_array($gerencia))
             {
             echo $rest2['nom_gerencia'] ;
             }
             ?>"

             >
        </label>

            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DEPARTAMENTO:
                <input type="text"  name="departamento" value="<?php
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

            <?php
        }
        ?>
       <div class="mt-10 md:flex ">
        <div class="max-w-full flex-row  mb-8 md:mr-2">

                <input type="radio" id="horas" name="opcion" value="1" required>
                <label for="male">Sin goce haber</label><br>
                <input type="radio" id="sin1" name="opcion" value="2" required>
                <label for="female">Cumpleaños</label><br>
                <input type="radio" id="sin2" name="opcion" value="3" required>
                <label for="other">Compensación</label><br>
                <input type="radio" id="sin3" name="opcion" value="4" required>
                <label for="other">Clases varios</label><br>
                <input type="radio" id="sin4" name="opcion" value="5" required>
                <label for="male">Universidad</label><br>
        </div>
        <div class="max-w-full flex-row  mb-8 md:mr-2">

            <input type="radio" id="sin5" name="opcion" value="6" required>
                <label for="female">Seminarios</label><br>
                <input type="radio" id="sin6" name="opcion" value="7" required>
                <label for="other">Matrimonio</label><br>
                <input type="radio" id="sin7" name="opcion" value="8" required>
                <label for="male">Duelo</label><br>
                <input type="radio" id="sin8" name="opcion" value="9" required>
                <label for="female">Lactancia</label><br>
                <input type="radio" id="sin9" name="opcion" value="10" required>
                <label for="other">Consulta medica</label>
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
              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" required type="date" id="fechainicio" name="fechainicio" onkeydown="return false" >
            </div>
            <div class="md:w-1/2 px-3">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">FECHA FIN</label>
              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" required type="date" id="fechafin" name="fechafin" onkeydown="return false">
            </div>
        </div>



          <div id="div1"  style="display:none">
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA INICIO</label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"  type="time" id="horainicio" name="horainicio"/>

                </div>
                <div class="md:w-1/2 px-3">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA FIN</label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"  type="time" id="horafin" name="horafin"/>

                </div>
            </div>
          </div>
          <div id="div2"  style="display:none">holas 2 
          <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA INICIO</label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"  type="time" id="horainicio" name="horainicio"/>

                </div>
                <div class="md:w-1/2 px-3">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA FIN</label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"  type="time" id="horafin" name="horafin"/>

                </div>
            </div>
          
          </div>

        

          <div id="div3"  style="display:none">holas 3</div>
          <div id="div4"  style="display:none">holas 4</div>



          <div id="div5"  style="display:none">holas 5
          
          <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA INICIO</label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"  type="time" id="horainicio" name="horainicio"/>

                </div>
                <div class="md:w-1/2 px-3">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA FIN</label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"  type="time" id="horafin" name="horafin"/>

                </div>
            </div>

          </div>
          <div id="div6"  style="display:none">holas 6
          
          <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA INICIO</label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"  type="time" id="horainicio" name="horainicio"/>

                </div>
                <div class="md:w-1/2 px-3">
                  <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="from">HORA FIN</label>
                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"  type="time" id="horafin" name="horafin"/>

                </div>
            </div>

          </div>
          <div id="div7"  style="display:none">holas 7</div>
          <div id="div8"  style="display:none">holas 8</div>
          <div id="div9"  style="display:none">holas 9</div>
          <div id="div10"  style="display:none">
          <span class="text-red-500 text-xs italic">
              TODAS LAS SOLICITUDES DE CONSULTA MEDICA DEBEN TENER UN DOCUMENTO DE RESPALDO
            </span>


          <div class="md:w-1/2 px-3">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
            DOCUMENTO DE RESPALDO</label>

            <input type="file" accept="image/*" capture="camera" name="avatar" required>



        </div>


          </div>


          <div class="text-center">
            <span class="text-red-500 text-xs italic">
              VERIFIQUE EL REMITENTE SEA CORRECTO
            </span>
          </div>
          <div class="text-center">
            <span class="text-xs italic font-bold mb-2">
             USUARIO REMITENTE
            </span>
          </div>
          <div class="-mx-3 md:flex mb-6">

          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
              BUSCAR:
              </label>

              <input required type="text" name= "gerencia" id="gerencia">
              </div>
              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"for="application-link">
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


 <script>
    $(document).ready(function() {
      $("#horas").click(function() {
        $("#div1").show();
        $("#div2").hide();
        $("#div3").hide();
        $("#div4").hide();
        $("#div5").hide();
        $("#div6").hide();
        $("#div7").hide();
        $("#div8").hide();
        $("#div9").hide();
        $("#div10").hide();
      });

      $("#sin1").click(function() {
        $("#div1").hide();
        $("#div2").show();
        $("#div3").hide();
        $("#div4").hide();
        $("#div5").hide();
        $("#div6").hide();
        $("#div7").hide();
        $("#div8").hide();
        $("#div9").hide();
        $("#div10").hide();

      });
      $("#sin2").click(function() {
        $("#div1").hide();
        $("#div2").hide();
        $("#div3").show();
        $("#div4").hide();
        $("#div5").hide();
        $("#div6").hide();
        $("#div7").hide();
        $("#div8").hide();
        $("#div9").hide();
        $("#div10").hide();

      });
      $("#sin3").click(function() {
        $("#div1").hide();
        $("#div2").hide();
        $("#div3").hide();
        $("#div4").show();
        $("#div5").hide();
        $("#div6").hide();
        $("#div7").hide();
        $("#div8").hide();
        $("#div9").hide();
        $("#div10").hide();

      });
      $("#sin4").click(function() {
        $("#div1").hide();
        $("#div2").hide();
        $("#div3").hide();
        $("#div4").hide();
        $("#div5").show();
        $("#div6").hide();
        $("#div7").hide();
        $("#div8").hide();
        $("#div9").hide();
        $("#div10").hide();

      });
      $("#sin5").click(function() {
        $("#div1").hide();
        $("#div2").hide();
        $("#div3").hide();
        $("#div4").hide();
        $("#div5").hide();
        $("#div6").show();
        $("#div7").hide();
        $("#div8").hide();
        $("#div9").hide();
        $("#div10").hide();

      });
      $("#sin6").click(function() {
        $("#div1").hide();
        $("#div2").hide();
        $("#div3").hide();
        $("#div4").hide();
        $("#div5").hide();
        $("#div6").hide();
        $("#div7").show();
        $("#div8").hide();
        $("#div9").hide();
        $("#div10").hide();

      });
      $("#sin7").click(function() {
        $("#div1").hide();
        $("#div2").hide();
        $("#div3").hide();
        $("#div4").hide();
        $("#div5").hide();
        $("#div6").hide();
        $("#div7").hide();
        $("#div8").show();
        $("#div9").hide();
        $("#div10").hide();

      });
      $("#sin8").click(function() {
        $("#div1").hide();
        $("#div2").hide();
        $("#div3").hide();
        $("#div4").hide();
        $("#div5").hide();
        $("#div6").hide();
        $("#div7").hide();
        $("#div8").hide();
        $("#div9").show();
        $("#div10").hide();

      });
      $("#sin9").click(function() {
        $("#div1").hide();
        $("#div2").hide();
        $("#div3").hide();
        $("#div4").hide();
        $("#div5").hide();
        $("#div6").hide();
        $("#div7").hide();
        $("#div8").hide();
        $("#div9").hide();
        $("#div10").show();

      });
    });
</script>
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
