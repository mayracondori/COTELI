@extends('layouts.plantilla')
@section('title','admin')
@section('content')

<br>
<?php
$codigo1= session('codigo_usu');
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
//$var=$_GET['iden'];
$bd =mysqli_select_db ($coneccion, $basededatos);
$var= session('imprimir1');
?>


<?php  $codigo = "SELECT s.id, s.fecha_solicitud, t.nom_tiposolicitud, te.nom_tipoexcepcion, o.nom_opciones, s.fechainicio, s.fechafin, s.horainicio,
                  s.horafin, s.comentario, s.fecharespuesta, u.nombres_usu, u.apellidos_usu, u.codigo_usu, g.nom_gerencia, d.nom_depto FROM solicitud AS s,
                  tiposolicitud AS t, tipoexcepcion AS te, opcioneslista AS o, usuario AS u, gerencia AS g, departamento AS d WHERE s.id='$var'
                  and s.id_usuario=u.id AND s.id_tiposolicitud = t.id_tiposolicitud AND s.id_tipoexcepcion = te.id_tipoexcepcion AND s.id_opcioneslista = o.id_opcioneslista
                  AND u.id_gerencia = g.id_gerencia AND u.id_departamento = d.id_departamento and s.estado = '1' ORDER BY s.fecha_solicitud DESC";
        $resultado = mysqli_query($coneccion, $codigo);
        while ($rest = mysqli_fetch_array($resultado)) {
            ?>



<div class="mx-auto max-w-4xl bg-yellow-100 py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form action="{{route('usuario.download')}}" method="post" id="formulario" autocomplete="off">
    @csrf
      <div class="bg-yellow-200 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">


        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">FORMULARIO DE EXCEPCIONES PERMISOS</label>

        <img src="https://pagos.cotel.bo/assets/admin/img/login.png" class="object-right-top object-scale-down h-16 w-full ">

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA DE SOLICITUD:
          <input type="text" value="<?php echo $rest ['fecha_solicitud']; ?>" >
          <label> FECHA RESPUESTA<input type="text" value="<?php echo $rest ['fecharespuesta']; ?>"> </label>
        </label>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:
            <input type="text"  name="codigo" size="7" value="<?php echo $rest ['codigo_usu']; ?>">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE:
              <input type="text" style="width : 200px;" name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
            </label>
        </label>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">GERENCIA:
            <input type=»text» name="gerencia" value="<?php echo $rest ['nom_gerencia']; ?>">
             <label class="uppercase tracking-wide text-black text-xs font-bold mb-2">DEPARTAMENTO:
              <input type="text"  name="departamento" value="<?php echo $rest ['nom_depto']; ?>" >
            </label>
        </label>



        <label  class="uppercase tracking-wide text-black text-xs font-bold mb-2" >TIPO SOLICITUD
        <input type="text" value="<?php echo $rest ['nom_tiposolicitud']; ?>">
        </label>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">tipo excepcion:
          <input type=»text» name="gerencia" value="<?php echo $rest ['nom_tipoexcepcion']; ?>">
           <label class="uppercase tracking-wide text-black text-xs font-bold mb-2">opcion:
            <input type="text"  name="departamento" value="<?php echo $rest ['nom_opciones']; ?>" >
          </label>
        </label>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">fecha inicio:
          <input type=»text» name="gerencia" value="<?php echo $rest ['fechainicio']; ?>">
           <label class="uppercase tracking-wide text-black text-xs font-bold mb-2">fecha fin:
            <input type="text"  name="departamento" value="<?php echo $rest ['fechafin']; ?>" >
          </label>
        </label>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">hora inicio:
          <input type=»text» name="gerencia" value="<?php echo $rest ['horainicio']; ?>">
           <label class="uppercase tracking-wide text-black text-xs font-bold mb-2">hola fin:
            <input type="text"  name="departamento" value="<?php echo $rest ['horafin']; ?>" >
          </label>
        </label>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">hora inicio:
        </label>
        <textarea name="" id="" cols="20" rows="5"><?php echo $rest ['comentario']; ?> </textarea>


        <button type="submit" class="md:w-full bg-yellow-400 text-white hover:bg-green-400 font-bold py-2 px-32 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              Imprimir
            </button>
           

      </div>
    </form>
  </div>
  <?php
          }
          ?>
@endsection
