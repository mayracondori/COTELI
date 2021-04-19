@extends('layouts.plantilla')
@section('title','ACEPTAR SOLICITUD')
@section('content')
<br>


<?php
  $codigo2= session('codigo_usu');

    $solicitante = $_GET['codigoempleado'];
    $solicitud = $_GET['id'];
    //echo $codigoempleado;
   $coneccion = mysqli_connect ("localhost", "root", "" );
   $basededatos = 'cotel';
   $bd =mysqli_select_db ($coneccion, $basededatos);

           $codigo = "select * from usuario where codigo_usu=$solicitante";
           $resultado = mysqli_query($coneccion, $codigo);
           while ($rest = mysqli_fetch_array($resultado)) {

           $consultita=" SELECT o.id_opcioneslista,SUBSTRING(s.foto_med, 8)AS foto_med,s.id,t.nom_tiposolicitud,s.id_tipoexcepcion,te.nom_tipoexcepcion,o.nom_opciones,s.fecha_solicitud,s.fechainicio,s.fechafin
            from solicitud as s, tiposolicitud as t, tipoexcepcion as te,opcioneslista as o
            WHERE  s.id=$solicitud and s.id_tipoexcepcion= te.id_tipoexcepcion  and s.id_opcioneslista=o.id_opcioneslista
            and s.id_tiposolicitud=t.id_tiposolicitud";
            $resultado2=mysqli_query($coneccion,$consultita);
            while($rest2=mysqli_fetch_array($resultado2)){


               ?>


<div class="mx-auto max-w-4xl bg-white py-5 px-12 lg:px-24 shadow-xl mb-24">
    <form action="{{('aceptarsolicitud')}}" method="POST">
@csrf
<label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">
          <script name="fecharespuesta">

              var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
              var f=new Date();
              document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
          </script></label>
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex-col ">


        <label class="uppercase tracking-wide text-black text-xl text-center font-bold mb-2">DETALLES DE LA SOLICITUD PENDIENTE</label>
        <img src="https://pagos.cotel.bo/assets/admin/img/login.png" class="object-right-top object-scale-down h-16 w-full ">
        <h1>INFORMACIÓN DE LA SOLICITUD</h1>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA DE SOLICITUD:
         <input type="text"name="fechasolicitud" value="<?php echo $rest2 ['fecha_solicitud']; ?>" readonly>   </label>
        <br>
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">TIPO DE SOLICITUD:
         <input type="text"name="nom_tipoexcepcion" value="<?php echo $rest2 ['nom_tipoexcepcion']; ?>">   </label>
         <br>
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">OPCION ELEGIDA:
         <input type="text"name="fechasolicitud" value="<?php echo $rest2 ['nom_opciones']; ?>">   </label>
       <br>
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA INICIO:

         <input type="text"name="fechasolicitud" value="<?php echo $rest2 ['fechainicio']; ?>">   </label>
      <br>
         <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">FECHA FIN:
         <input type="text"name="fechasolicitud" value="<?php echo $rest2 ['fechafin']; ?>">   </label>
        <br>
        <input type="hidden" name="fechainicio" value="<?php echo $rest2 ['fechainicio'];?>">
        <input type="hidden" name="fechafin" value="<?php echo $rest2 ['fechafin'];?>">

        <br>

        <?php
        if($rest2 ['id_opcioneslista']==10){
            $fotito=$rest2 ['foto_med'];
        $utd="http://localhost/cotel/public/storage/".$fotito;
        ?>
 <img src="<?php echo $utd;?>">
<?php
        }

            ?>


         <h6>INFORMACIÓN DEL SOLICITANTE</h6>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">CODIGO DE EMPLEADO:

        <input type="text" name="codigo" value="<?php echo $rest ['codigo_usu']; ?>">

        <input type="hidden" name="id" value="<?php echo $rest ['id']; ?>">
        <input type="hidden" name="remitente1" value="<?php echo $codigo2 ;?>">
<br>
    </label>
        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">APELLIDO Y NOMBRE:
            <input type="text"  name="apellidonombre" value="<?php echo $rest['apellidos_usu']." ".$rest ['nombres_usu']; ?>">
        </label>
        <br>

        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">GERENCIA:
            <input type="text"  name="gerencia" value="<?php
                $id=$rest['id'];
                 $consulta="SELECT g.nom_gerencia from usuario as u, gerencia as g where u.id = '$id'and g.id_gerencia =u.id_gerencia";
                 $gerencia = mysqli_query($coneccion, $consulta);
                 while($rest22 = mysqli_fetch_array($gerencia))
                 {
                 echo $rest22['nom_gerencia'] ;
                 }
                 ?>"

                 >
                </label>

<br>

            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">DEPARTAMENTO:
            <input type="text"name="departamento" value="<?php
            $id=$rest['id'];
             $consulta="SELECT d.nom_depto FROM usuario as u, departamento as d where u.id = '$id'and d.id_departamento =u.id_departamento";
             $gerencia = mysqli_query($coneccion, $consulta);
             while($rest23 = mysqli_fetch_array($gerencia))
             {
             echo $rest23['nom_depto'] ;
             }
             ?>"

             >
        </label>
<br>

    <label class="uppercase text-black text-xs font-bold mb-2" for="">COMENTARIO:
        <textarea style="border-color: rgb(255, 144, 0);"  name="comentario" id="comentario" cols="100" rows="5" ></textarea>

         <input type="hidden" name="idsolicitud" value="<?php echo $solicitud ?>">

        <?php



  $consultita2=" SELECT s.id,s.fechainicio,s.fechafin
            from solicitud as s
            WHERE  s.id=$solicitud ";
            $resultado21=mysqli_query($coneccion,$consultita2);
            while($rest21=mysqli_fetch_array($resultado21)){



 /* $fecha1= date_create(date( $rest21['fechainicio']));
         $fecha2= date_create(date($rest21['fechafin']));
         $diasdif=date_diff($fecha1,$fecha2);*/



         $consult="SELECT Fecha FROM feriados  where estado='1'";
         $feri = mysqli_query($coneccion, $consult);

         $feriados = array();
         $cont = 0;


        // $arrayferiados[$contador]=$rest1234['Fecha'];

while ($rest1234 = @mysqli_fetch_array($feri)) {
   $feriados[$cont] = $rest1234['Fecha'];
   $cont++;
}
foreach ($feriados as $valor) {
  //echo $valor;
}
         $inicio = new DateTime(date( $rest21['fechainicio']));
         $fin = new DateTime(date($rest21['fechafin']));
         $fin->modify('+1 day');
         $intervalo = $fin->diff($inicio);
         $dias = $intervalo->days;
         $period = new DatePeriod($inicio, new DateInterval('P1D'), $fin);

         foreach($period as $dt) {
                $curr = $dt->format('D');

                if ($curr == 'Sat' || $curr == 'Sun') {
                    $dias--;
                }

                elseif (in_array($dt->format('Y-m-d'), $feriados)) {
                    $dias--;
                }
         }
           // echo $dias;
            }
 if($dias<6){
   echo "duracion menor  igual a 5 dias hábiles";

  }else{

    $codigo5 = "select id,nombres_usu,codigo_usu,apellidos_usu from usuario where  id_tipousuario='3' ";
    $resultado5 = mysqli_query($coneccion, $codigo5);
    while ($rest5 = mysqli_fetch_array($resultado5)) {

      $codigo= $rest5['codigo_usu'];
      $nombre=$rest5['nombres_usu']." ".$rest5['apellidos_usu'];
    }

?>
<br>
  En caso de aprobar la solicitud, debe mandar a un gerente para que tambien lo apruebe y pase a recursos humanos
    esto debido a ser la duracion mayor a 5 dias hábiles

<br>
<label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="">PARA :


  <select required name="para" id="para">;

        <?php
            $codigo5 = "select id,nombres_usu,codigo_usu,apellidos_usu from usuario where  id_tipousuario='3' ";
            $resultado5 = mysqli_query($coneccion, $codigo5);
            while ($rest5 = mysqli_fetch_array($resultado5)) {
        ?>


        <option value="<?php
          echo $rest5['codigo_usu']; ?>">
          <?php  echo $rest5['nombres_usu']." ".$rest5['apellidos_usu']; ?>



        </option>

        <?php
          }//cer

        ?>

  </select>
</label>
<?php
}
            }
          }
   ?>
       <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
          <div class="row " style="margin: auto;
  width: 50%;">
            <button name="boton" value="aceptar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              ACEPTAR SOLICITUD
            </button>

            <button name="boton" value="rechazar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              RECHAZAR SOLICITUD
            </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

@endsection



