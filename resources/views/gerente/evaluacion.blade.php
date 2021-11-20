@extends('layouts.plantilla')
@section('title','EVALUACION')

@section('content')
<?php

$codigoeva= session('codigo_usu');
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
 
        $codigo2 = " SELECT u.id, u.nombres_usu,u.apellidos_usu,u.codigo_usu,u.id_gerencia,g.nom_gerencia FROM usuario u, gerencia as g WHERE u.id_gerencia= g.id_gerencia and u.codigo_usu=$codigoeva       ";
        $resultado2 = mysqli_query($coneccion, $codigo2);
        while ($rest2 = mysqli_fetch_array($resultado2)) {
            $idusu=$rest2['id'];
            $nombres=$rest2['nombres_usu'];
            $apellidos=$rest2['apellidos_usu'];
            $gerencia=$rest2['nom_gerencia'];
            $idgerencia=$rest2['id_gerencia'];

        }
        $codigo23 = " SELECT count(id) as faltan FROM usuario WHERE id_gerencia= $idgerencia and Estado_eva=0 and id_tipousuario<=2      ";
        $resultado23 = mysqli_query($coneccion, $codigo23);
        while ($rest23 = mysqli_fetch_array($resultado23)) {
            $faltan=$rest23['faltan'];

        }
        $codigo231 = " SELECT count(id) as son FROM usuario WHERE id_gerencia= $idgerencia  and id_tipousuario<3      ";
        $resultado231 = mysqli_query($coneccion, $codigo231);
        while ($rest231 = mysqli_fetch_array($resultado231)) {
            $son=$rest231['son'];

        }
        

?>
<BR></BR>
      
<div class="bg-yellow-100 table w-full p-2">
               
<img src="{{url('../img/login.png')}}" class="object-left-top object-scale-down h-16 w-full ">
<div class=" items-center bg-blue-500 text-white text-sm font-bold px-4 " role="alert">
  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"></svg>
  <p> <?php echo "Le faltan realizar la evaluacion de ".$faltan." personas de un total de ".$son." personas " ?>
</p>
</div>
<form enctype="multipart/form-data" action="{{route('gerente.enviareva')}}" method="POST" id="formulario" autocomplete="off">
@csrf

<div class="md:flex flex-row md:space-x-4 w-full  " >

<div class="mb-4 space-y-2 w-full ">

        <h2 class=" text-center">NIVEL EJECUTIVO/MANDOS MEDIOS</h2>   
                    <h4 class=" text-center">Subgerentes,Directores y Jefes de Departamento</h4>

        </div>
        <div class="mb-4 space-y-2 w-full ">
        <table  class="w-full border">
        <tbody>
        <tr class="bg-gray-50 text-center">
        <td class="p-2 border-r"><h5>DIRECCIÓN DE RECURSOS HUMANOS</h5></td>
        </tr>
        
        <tr class="bg-gray-50 text-center">
        <td class="p-2 border-r"><h4>EVALUACIÓN DEL DESEMPEÑO 2021</h4></td>
        </tr>
        </tbody>
                    </table>
        </div>
</div>
<BR></BR>

       <table class="w-full border">
       <tbody>
                <tr class="bg-gray-50 text-center">
                    
                    <td class="p-2 border-r">
                    Unidad Administrativa:</td>
                    <td class="p-4 border-r">
                        <input type="text" value="<?php echo $gerencia ?>" class="border p-1">
                    </td>
                    <td class="p-2 border-r">
                     Fecha de evaluación:
                    </td>
                    <td class="p-2 border-r">
                        <input type="text" name="Fecha_eva" id="Fecha_eva" value="<?php 
                        $fechaactual=date('Y-m-d');
                        echo $fechaactual ?>" class="border p-1">
                    </td>
                
                </tr>
                <tr class="bg-gray-50 text-center">
                   
                    <td class="p-2 border-r">
                   Nombre del evaluador:</td>
                    <td class="p-4 border-r">
                        <input type="text" value="<?php echo $nombres." ".$apellidos ?>" class="border p-1">
                   <input type="hidden" value="<?php echo $idusu ?>" name="Id_usu" id="Id_usu">
                    </td>
                    <td class="p-2 border-r">
                     Codigo del evaluador:
                    </td>
                    <td class="p-2 border-r">
                        <input type="text" value="<?php echo $codigoeva ?>" class="border p-1">
                    </td>
                
                </tr>
              
                <tr class="bg-gray-50 text-center">
                   
                    <td class="p-2 border-r">
                  Cargo del evaluado:</td>
                    <td class="p-4 border-r">
                        <input type="text" class="border p-1" value="Empleado">
                    </td>
                    <td class="p-2 border-r">
                     Nombre del evaluado:
                    </td>
                    <td class="p-2 border-r">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
              BUSCAR AL EVALUADO (nombre):
              </label>

              <input  type="text" name= "gerencia" id="gerencia">
              
              <select required name="departamento" id="departamento"></select>
                    </td>
                
                </tr>
              
                
            </tbody>
       </table> 
       <table class="w-full border">
<tbody>
<center><strong> <h1>Instrucciones</h1></strong> </center>
    
       

<tr class=" text-center">
        <td style="width:300px" class="p-2 border-r">
        <p>Para cada competencia marque  en la columna "Calificación de Desempeño" de acuerdo al desempeño demostrado por el trabajador en elperiodo de referencia</p></td>
        <td class="p-2 border-r">
                <label > Muy Alto - El trabajador supera las expectativas previstas en el desempeño de sus funciones.</label>
            <br>
            <label > Alto - El trabajo demuestracapacidad en el cumplimiento de sus funciones.</label>
            <br>
            <label > Medio - El trabajador cumple con lo mínimo establecido para el cumplimiento de sus funciones.</label>
            <br>
            <label > Bajo - El trabajador no demuestracapacidad en el cumplimiento de sus funciones.</label>
            <br>
            <label > Muy Bajo - El  trabajo no cumple con las funciones encomendadas</label>
        </td>
       
        </tr>
</tbody>
</table>


        <table class="w-full border">
            <thead>
                <tr class="bg-gray-50 border-b">
                
                    <th colspan="3" style="width:800px" class="border-r p-2">
                       <h2>Factores</h2>
                    </th>
                    <th colspan="5" style="width:530px" class="border-r p-2">
                       <h2>Calificacion de Desempeño</h2>
                    </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    
           <?php

 $contblo=1;
        $codigo1 = " SELECT  b.Nom_bloque,B.Id_bloque
        FROM preguntas as p, bloquepre as b
        WHERE p.Id_bloque=b.Id_bloque and p.Estado_pre=1 GROUP by p.Id_bloque ORDER BY b.Id_bloque asc
        ";
        $resultado1 = mysqli_query($coneccion, $codigo1);
        while ($rest1 = mysqli_fetch_array($resultado1)) {
          

?>
<table class=" border">
            <thead border="5">
                <tr class="bg-gray-50 border-b">
                
                    <th colspan="3"style="width:800px" class="border-r p-2">
                       <h2><?php echo $contblo.". ".$rest1['Nom_bloque'] ?></h2>
                    </th>
                    <th style="width:106px" class="border-r p-2">
                       <h2>Muy Alto</h2>
                    </th>
                    <th style="width:106px" class="border-r p-2">
                       <h2>Alto</h2>
                    </th>
                    <th style="width:106px" class="border-r p-2">
                       <h2>Medio</h2>
                    </th>
                    <th style="width:106px" class="border-r p-2">
                       <h2>Baja</h2>
                    </th>
                    <th style="width:106px" class="border-r p-2">
                       <h2>Muy Baja</h2>
                    </th>
                   
                </tr>
            </thead>
            
            <?php
$mibloque=$rest1['Id_bloque'];
      
            $cont=1;
                   $codigo = " SELECT  b.Nom_bloque, p.Pregunta_pre,p.Titulo_pre,p.Id_pre
                   FROM preguntas as p, bloquepre as b
                   WHERE p.Id_bloque=b.Id_bloque and p.Estado_pre=1 and p.Id_bloque=$mibloque ORDER by p.Id_bloque asc
                   ";
                   $resultado = mysqli_query($coneccion, $codigo);
                   while ($rest = mysqli_fetch_array($resultado)) {
                   
$pregunt=$rest['Id_pre'];
?>
           <tbody>
                <tr class="bg-gray-50 text-center">
                    <td style="width:50px" class="p-2 border-r">
                        <?php echo $contblo.".".$cont?>
                    </td>
                    <td style="width:250px" class="p-2 border-r">
                        <H1><?php echo $rest['Titulo_pre']?></H1>
                    </td>
                    <td style="width:500px" class="p-2 border-r">
                   <p><?php echo $rest['Pregunta_pre']?>
                   </p>
                    </td>
                    <td class="p-2 border-r" style="width:100px">
                    <input type="radio" name="<?php echo 'pregunta['.$rest['Id_pre'].']'?>"  value="
                    <?php 
                    $codigo89 = "SELECT Id_conpr from conpreres where Id_tiporesp=1 and Id_pre=$pregunt";
                    $resultado89 = mysqli_query($coneccion, $codigo89);
                    while ($rest89 = mysqli_fetch_array($resultado89)) {
                    $con=$rest89['Id_conpr'];

                    }
                    echo $con?>" >
                    </td>
                    <td class="p-2 border-r" style="width:100px">
                    <input type="radio" value="
                    <?php 
                    $codigo892 = "SELECT Id_conpr from conpreres where Id_tiporesp=2 and Id_pre=$pregunt";
                    $resultado892 = mysqli_query($coneccion, $codigo892);
                    while ($rest892 = mysqli_fetch_array($resultado892)) {
                    $con2=$rest892['Id_conpr'];

                    }
                    echo $con2?>" name="<?php echo 'pregunta['.$rest['Id_pre'].']'?>">
                    </td>
                    <td class="p-2" style="width:100px">
                    <input type="radio" value="
                    <?php 
                    $codigo893 = "SELECT Id_conpr from conpreres where Id_tiporesp=3 and Id_pre=$pregunt";
                    $resultado893 = mysqli_query($coneccion, $codigo893);
                    while ($rest893 = mysqli_fetch_array($resultado893)) {
                    $con3=$rest893['Id_conpr'];

                    }
                    echo $con3?>" name="<?php echo 'pregunta['.$rest['Id_pre'].']'?>">
                    </td>
                    <td class="p-2 border-r" style="width:100px">
                    <input type="radio" value="
                    <?php 
                    $codigo894 = "SELECT Id_conpr from conpreres where Id_tiporesp=4 and Id_pre=$pregunt";
                    $resultado894 = mysqli_query($coneccion, $codigo894);
                    while ($rest894 = mysqli_fetch_array($resultado894)) {
                    $con4=$rest894['Id_conpr'];

                    }
                    echo $con4?>" name="<?php echo 'pregunta['.$rest['Id_pre'].']'?>">
                    </td>
                    <td class="p-2" style="width:100px">
                    <input type="radio" value="
                    <?php 
                    $codigo895 = "SELECT Id_conpr from conpreres where Id_tiporesp=5 and Id_pre=$pregunt";
                    $resultado895 = mysqli_query($coneccion, $codigo895);
                    while ($rest895 = mysqli_fetch_array($resultado895)) {
                    $con5=$rest895['Id_conpr'];

                    }
                    echo $con5?>" name="<?php echo 'pregunta['.$rest['Id_pre'].']'?>">
                    </td>
                    
                    
                </tr>
              
            </tbody>
           
              <?php
                  $cont=$cont+1;
                }
      ?>
                </table> 
                <br>
                <?php
              $contblo=$contblo+1;
            }
              ?> 
              

<table class=" w-full border">
<thead>
                <tr class="bg-gray-50 border-b">
                
                    <th  class=" w-full border-r p-2">
                       <h2>Fortalezas y debilidad</h2>
                    </th>
                </tr>
            </thead>

            <tbody>
            <tr class="bg-gray-50 w-full">
                    <td  class="p-2 text-align-left border-r" >
                        La fortaleza del evaluado es:
                    </td>
                   </tr>
                   <tr>
                    <td  class="p-2 w-full border-r">
                        <textarea  required name="Fortaleza_eva" id="Fortaleza_eva" cols="185" rows="2" placeholder=" Debe incluir las fortalezas de su evaluado. Por ejemplo : Liderazgo, perseverancia, etc."></textarea>
                    </td>               
                    
                </tr>
                <tr class="bg-gray-50 w-full">
                    <td  class="p-2 text-align-left border-r">
                        La debilidad del evaluado es:
                    </td>
                   </tr>
                   <tr>
                    <td  class="p-2 w-full border-r">
                        <textarea required name="Debilidad_eva" id="Debilidad_eva" cols="185" rows="2" placeholder=" Debe incluir las debilidades de su evaluado. Por ejemplo : Impuntualidad, impaciencia, etc."></textarea>
                    </td>               
                    
                </tr>
            </tbody>
</table>


<table class=" w-full border">
<thead>
                <tr class="bg-gray-50 border-b">
                
                    <th  colspan="5" class=" w-full border-r p-2">
                       <h2>Detección de necesidades de capacitación</h2>
                    </th>
                </tr>
                <tr class="bg-gray-50 border-b">
                
                    <th  rowspan="2" colspan="2" class=" border-r p-2">
                       <p>Indique el o los temas en el que el trabajador debe
                        fortalecer sus conocimientos, destrezas, habilidades o actitudes para un mejor desempeño</p>
                    </th>
                    <th  colspan="3" class=" border-r p-2">
                       <h2>Profundidad</h2>
                    </th>
                </tr>
                <tr class="bg-gray-50 border-b">
                
                <th style="width:106px" class="  border-r p-2">
                   <h2>Básico</h2>
                </th>
                <th style="width:106px" class="  border-r p-2">
                   <h2>Medio</h2>
                </th>
                <th style="width:106px"  class="  border-r p-2">
                   <h2>Avanzado</h2>
                </th>
            </tr>
        
            </thead>
            <tbody>
                <tr class="bg-gray-50 text-center">
                    <td style="width:50px" class="p-2 border-r">
                       1.
                    </td>
                    <td style="width:400px" class="p-2 border-r">
                       <input type="text" name="Descrip_nec1" id="Descrip_nec1" class="w-full" placeholder="Ejemplo: Curso de ofimática" >
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="1" name="necesidad" >
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="2" name="necesidad">
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio"  value="3"name="necesidad">
                    </td>
               </tr>
               <tr class="bg-gray-50 text-center">
                    <td style="width:50px" class="p-2 border-r">
                       2.
                    </td>
                    <td style="width:400px" class="p-2 border-r">
                       <input type="text" name="Descrip_nec2" id="Descrip_nec2" class="w-full" placeholder="Ejemplo: Curso de atención al cliente">
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="1" name="necesidad2">
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="2" name="necesidad2">
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="3" name="necesidad2">
                    </td>
               </tr>
               <tr class="bg-gray-50 text-center">
                    <td style="width:50px" class="p-2 border-r">
                       3.
                    </td>
                    <td style="width:400px" class="p-2 border-r">
                       <input type="text"  name="Descrip_nec3" id="Descrip_nec3" class="w-full" placeholder="Ejemplo: Curso de detección de billetes." >
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="1" name="necesidad3">
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="2" name="necesidad3">
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="3" name="necesidad3">
                    </td>
               </tr>
               <tr class="bg-gray-50 text-center">
                    <td style="width:50px" class="p-2 border-r">
                       4.
                    </td>
                    <td style="width:400px" class="p-2 border-r">
                       <input type="text" name="Descrip_nec4" id="Descrip_nec4" class="w-full" placeholder="Ejemplo: Curso de excel" >
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio"  value="1" name="necesidad4">
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio"  value="2" name="necesidad4">
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="3" name="necesidad4">
                    </td>
               </tr>
               <tr class="bg-gray-50 text-center">
                    <td style="width:50px" class="p-2 border-r">
                       5.
                    </td>
                    <td style="width:400px" class="p-2 border-r">
                       <input type="text" name="Descrip_nec5" id="Descrip_nec5" class="w-full" placeholder="Ejemplo: Curso de oratoria" >
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="1" name="necesidad5">
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="2" name="necesidad5">
                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" value="3" name="necesidad5">
                    </td>
               </tr>
              
            </tbody>
</table>


<center>
<button name="boton" value="enviar" class="md-2 bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              ENVIAR EVALUACION 
            </button>
</form>
</center>
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