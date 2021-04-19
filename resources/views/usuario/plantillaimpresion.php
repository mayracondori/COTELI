<!DOCTYPE html>
<html lang="es" style="margin: 0;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> Cotel</title>

</head>
<body style=" margin: 0mm 0mm 0mm 0mm;background:rgb(254, 252, 191);">
<?php
$codigo1= session('codigo_usu');
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
$var= session('imprimir1');
?>
<?php  $codigo = "SELECT s.id, s.fecha_solicitud, t.nom_tiposolicitud, te.nom_tipoexcepcion, o.nom_opciones, s.fechainicio, s.fechafin, s.horainicio, s.historial_remitentes,
                  s.horafin, s.comentario, s.fecharespuesta, u.nombres_usu, u.apellidos_usu, u.codigo_usu, g.nom_gerencia, d.nom_depto FROM solicitud AS s,
                  tiposolicitud AS t, tipoexcepcion AS te, opcioneslista AS o, usuario AS u, gerencia AS g, departamento AS d WHERE s.id='$var'
                  and s.id_usuario=u.id AND s.id_tiposolicitud = t.id_tiposolicitud AND s.id_tipoexcepcion = te.id_tipoexcepcion AND s.id_opcioneslista = o.id_opcioneslista
                  AND u.id_gerencia = g.id_gerencia AND u.id_departamento = d.id_departamento and s.estado = '1' ORDER BY s.fecha_solicitud DESC";
        $resultado = mysqli_query($coneccion, $codigo);
        while ($rest = mysqli_fetch_array($resultado)) {
            ?>

            <br>
            <br>
            <br>
            <br>
            <div style="border-style: solid;
                        padding-left:  10px;
                        padding-right: 10px;
                        margin-left:   10px;
                        margin-right:  10px;
                        border: 1px solid black;">
<div>
    <!--<form action="{{route('usuario.download')}}" method="post" id="formulario" autocomplete="off">-->

      <div >


      <strong>
       <br> <label style=" margin-left: 200px;">FORMULARIO DE EXCEPCIONES</label>
       </strong>

       <div style="margin-left:25px ">
       <img src="https://pagos.cotel.bo/assets/admin/img/login.png" width="120" style="margin: 0px 0px 0px 500px; " >
      <br>
            <strong><label style="font-family: Arial; font-size: 10pt;">FECHA DE SOLICITUD:</strong>
                <input style="border: none;background:white; margin-left: 8px ; font-family: Arial; font-size: 10pt; " type="text" value="<?php echo $rest ['fecha_solicitud']; ?>" >
            <strong><label style="font-family: Arial; font-size: 10pt; margin-left: 0px;"> FECHA RESPUESTA:</strong>
                <input style="border: none;background:white; margin-left: 5px ; font-family: Arial; font-size: 10pt; " type="text" value="<?php echo $rest ['fecharespuesta']; ?>"> </label>
        </label>


       <br>

       <strong> <label style="font-family: Arial; font-size: 10pt;">CODIGO DE EMPLEADO:
        </strong>
            <input style="border: none;background:white; margin-left: -5px ; font-family: Arial; font-size: 10pt; " type="text"  name="codigo"  value="<?php echo $rest ['codigo_usu']; ?>">
            <strong><label style="font-family: Arial; font-size: 10pt; margin-left: 0px;">APELLIDO Y NOMBRE:
              </strong>
              <input style="border: none;background:white;  margin-left: 20px; font-family: Arial; font-size: 10pt; margin-left: -5px; " type="text" style="width : 200px;" name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
            </label>
        </label>


        <br>

        <strong><label style="font-family: Arial; font-size: 10pt;">GERENCIA:
          </strong>
            <input style="border: none;background:white;  margin-left: 80px; font-family: Arial; font-size: 10pt; " type="text" name="gerencia" value="<?php echo $rest ['nom_gerencia']; ?>">
             <strong><label style="font-family: Arial; font-size: 10pt;">DEPARTAMENTO:
              </strong>
             <input style="border: none;background:white; margin-left: 27px ; font-family: Arial; font-size: 10pt; " type="text"  name="departamento" value="<?php echo $rest ['nom_depto']; ?>" >
            </label>
        </label>

      <br>

      <strong><label  style="font-family: Arial; font-size: 10pt;" >TIPO SOLICITUD
      </strong>   <input style="border: none;background:white; margin-left: 48px ; font-family: Arial; font-size: 10pt; "  type="text" value="<?php echo $rest ['nom_tiposolicitud']; ?>">
        </label>

       <br>

       <strong><label style="font-family: Arial; font-size: 10pt;">TIPO EXCEPCION:
        </strong>
         <input style="border: none;background:white; margin-left: 37px ; font-family: Arial; font-size: 10pt; " type="text" name="gerencia" value="<?php echo $rest ['nom_tipoexcepcion']; ?>">
           <strong><label style="font-family: Arial; font-size: 10pt;">OPCION:
            </strong>
                <input style="border: none;background:white; margin-left: 85px ; font-family: Arial; font-size: 10pt; " type="text"  name="departamento" value="<?php echo $rest ['nom_opciones']; ?>" >
          </label>
        </label>

       <br>

       <strong> <label style="font-family: Arial; font-size: 10pt;">FECHA INICIO:
        </strong>
          <input style="border: none;background:white; margin-left: 60px ; font-family: Arial; font-size: 10pt; " type="text" name="gerencia" value="<?php echo $rest ['fechainicio']; ?>">
           <strong><label style="font-family: Arial; font-size: 10pt;">FECHA FIN:
            </strong>
            <input style="border: none;background:white; margin-left: 68px; font-family: Arial; font-size: 10pt; " type="text"  name="departamento" value="<?php echo $rest ['fechafin']; ?>" >
          </label>
        </label>

       <br>

       <strong> <label style="font-family: Arial; font-size: 10pt; font-family: Arial; font-size: 10pt; ">HORA INICIO:
        </strong>
          <input  style="border: 0;background:white; margin-left: 67px ;" type="text" name="horainiaio" value="<?php echo $rest ['horainicio']; ?>">
           <strong><label style="font-family: Arial; font-size: 10pt;">HORA FIN:
            </strong>
            <input style="border: 0;background:white; margin-left: 75px; font-family: Arial; font-size: 10pt; " type="text"  name="departamento" value="<?php echo $rest ['horafin']; ?>" >
          </label>
        </label>
        <strong>

    <br>


    <label style="font-family: Arial; font-size: 10pt;">  ACEPTADO POR:
        </label>
      <br>   </strong>
      <textarea style="border: none;background:white; margin-left: 100px ; margin-right: 10px ;" name="" id="" cols="40" rows="3"><?php echo $rest ['historial_remitentes']; ?> </textarea>


    <label style="font-family: Arial; font-size: 10pt;">  COMENTARIO:
        </label>
      <br>   </strong>
      <textarea style="border: none;background:white; margin-left: 100px ; margin-right: 10px ;" name="" id="" cols="40" rows="3"><?php echo $rest ['comentario']; ?> </textarea>
        <br><!--<button type="submit" class="md:w-full bg-yellow-400 text-white hover:bg-green-400 font-bold py-2 px-32 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              Imprimir
            </button>-->

            </div>
        </div>
   <!-- </form>-->
  </div>
  </div>
  <?php
          }
          ?>
</body>

</html>
