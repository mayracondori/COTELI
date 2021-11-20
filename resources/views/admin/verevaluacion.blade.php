@extends('layouts.plantillaadmin')
@section('title','EVALUACION')

@section('content')
<?php

$idevaluacion=$_POST['Id_eva'];
$codigoeva= session('codigo_usu');
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
 
        $codigo2 = " SELECT e.Fecha_eva,e.Id_eva, u.nombres_usu, u.apellidos_usu,u.Codigo_usu, e.Codigo_evaluado,e.Valor_evaluacion,g.nom_gerencia,e.Fortaleza_eva,e.Debilidad_eva
        FROM evaluacion as e,usuario as u, gerencia as g
        WHERE e.Id_usu=u.id and e.Id_eva=$idevaluacion  and u.Id_gerencia=g.Id_gerencia";
        $resultado2 = mysqli_query($coneccion, $codigo2);
        while ($rest2 = mysqli_fetch_array($resultado2)) {
           $fechaeva=$rest2['Fecha_eva'];
           $nombreevaluador=$rest2['nombres_usu'];
           $apellidosevaluador=$rest2['apellidos_usu'];
           $codigousu=$rest2['Codigo_usu'];

           $codigoeva=$rest2['Codigo_evaluado'];
           $valoreva=$rest2['Valor_evaluacion'];
           $gerencia=$rest2['nom_gerencia'];
           
           $fortaleza=$rest2['Fortaleza_eva'];
           
           $debilidad=$rest2['Debilidad_eva'];


        }

?>
<BR></BR>
      
<div class="bg-yellow-100 table w-full p-2">
             
<img src="{{url('../img/login.png')}}" class="object-left-top object-scale-down h-16 w-full ">
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
                       
                        echo $fechaeva?>" class="border p-1">
                    </td>
                
                </tr>
                <tr class="bg-gray-50 text-center">
                   
                    <td class="p-2 border-r">
                   Nombre del evaluador:</td>
                    <td class="p-4 border-r">
                        <input type="text" value="<?php echo $nombreevaluador." ".$apellidosevaluador ?>" class="border p-1">
                 
                    </td>
                    <td class="p-2 border-r">
                     Codigo del evaluador:
                    </td>
                    <td class="p-2 border-r">
                        <input type="text" value="<?php echo $codigousu ?>" class="border p-1">
                    </td>
                
                </tr>
              
                <tr class="bg-gray-50 text-center">
                   
                    <td class="p-2 border-r">
                  Cargo del evaluado:</td>
                    <td class="p-4 border-r">
                        <input type="text" class="border p-1" value="Empleado">
                    </td>
                    <td class="p-2 border-r">
                    Codigo del evaluado:
                    </td>
                    <td class="p-2 border-r">
                   
              <input required type="text" value="<?php echo $codigoeva?>">
               </td>
                
                </tr>
              
                
            </tbody>
       </table> 
       <table class="w-full border">
<tbody>
<center><strong> <h1>Instrucciones</h1></strong> </center>
    
       

<tr  class=" text-rigth">
        <td style="width:300px" class="p-2 border-r">
        <p>Para cada competencia marque  en la columna "Calificación de Desempeño" de acuerdo al desempeño demostrado por el trabajador en elperiodo de referencia</p></td>
        <td  class="p-2 border-r">
                <label style="margin-left: 150px"> Muy Alto - El trabajador supera las expectativas previstas en el desempeño de sus funciones.</label>
            <br>
            <label style="margin-left: 150px"> Alto - El trabajo demuestracapacidad en el cumplimiento de sus funciones.</label>
            <br>
            <label style="margin-left: 150px"> Medio - El trabajador cumple con lo mínimo establecido para el cumplimiento de sus funciones.</label>
            <br>
            <label style="margin-left: 150px"> Bajo - El trabajador no demuestracapacidad en el cumplimiento de sus funciones.</label>
            <br>
            <label style="margin-left: 150px"> Muy Bajo - El  trabajo no cumple con las funciones encomendadas</label>
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
        $codigo1 = " SELECT b.Nom_bloque, b.Id_bloque
        FROM respuestas as r, conpreres as c, preguntas as p, bloquepre as b
        WHERE r.Id_eva=$idevaluacion and r.Id_conpr=c.Id_conpr and c.Id_pre=p.Id_pre  and p.Id_bloque=b.Id_bloque 
        GROUP BY p.Id_bloque ORDER by p.Id_bloque asc
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
                   $codigo = " SELECT p.Titulo_pre,p.Pregunta_pre,c.Id_tiporesp
                   FROM respuestas as r, conpreres as c, preguntas as p 
                   WHERE r.Id_eva=$idevaluacion and r.Id_conpr=c.Id_conpr and c.Id_pre=p.Id_pre and p.Id_bloque=$mibloque ";
                   $resultado = mysqli_query($coneccion, $codigo);
                   while ($rest = mysqli_fetch_array($resultado)) {
                   
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
                   <p><?php echo $rest['Pregunta_pre']?> </p>
                    </td>

                    <td class="p-2 border-r" style="width:100px">
                    <input type="radio"  <?php if( $rest['Id_tiporesp'] ==1) { ?>checked="checked"<?php } ?>>
                     
                    </td>
                    <td class="p-2 border-r" style="width:100px">
                    <input type="radio" <?php if( $rest['Id_tiporesp']==2) { ?>checked="checked"<?php } ?>>
                    </td>
                    <td class="p-2 border-r" style="width:100px">
                    <input type="radio" <?php if( $rest['Id_tiporesp']==3 ) { ?>checked="checked"<?php } ?>>
                    </td>
                    <td class="p-2 border-r" style="width:100px">
                    <input type="radio"<?php if( $rest['Id_tiporesp'] ==4 ) { ?>checked="checked"<?php } ?>>
                    </td>
                     <td class="p-2 border-r" style="width:100px">
                     <input type="radio" <?php if($rest['Id_tiporesp']==5 ) { ?>checked="checked"<?php } ?>>
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
                    <td  class="p-2 text-align-left border-r">
                        La fortaleza del evaluado es:
                    </td>
                   </tr>
                   <tr>
                    <td  class="p-2 w-full border-r">
                    <label for=""><?php echo $fortaleza?></label>
                    </td>               
                    
                </tr>
                <tr class="bg-gray-50 w-full">
                    <td  class="p-2 text-align-left border-r">
                        La debilidad del evaluado es:
                    </td>
                   </tr>
                   <tr>
                    <td  class="p-2 w-full border-r">
                    <label for=""><?php echo $debilidad?></label>
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

            
                    <?php
                    $contador=0;
                    $codigo123 = " SELECT n.Descrip_nec,n.Profun_nec
                    FROM evaluacion as e, necesidades as n
                    WHERE e.Id_eva=$idevaluacion and e.Id_eva=n.Id_eva ";
                   $resultado123 = mysqli_query($coneccion, $codigo123);
                   while ($rest123 = mysqli_fetch_array($resultado123)) {
                    $contador=$contador+1
                    ?>
                <tr class="bg-gray-50 text-center">
                    <td style="width:50px" class="p-2 border-r">
                       <?php echo $contador."."?>
                    </td>
                    <td style="width:400px" class="p-2 border-r">
                       <input type="text" class="w-full" value="<?php echo $rest123['Descrip_nec']?>" >
                    </td>
                    <td style="width:100px" class="p-2 border-r">              
                    <input type="radio" <?php if( $rest123['Profun_nec'] ==1) { ?>checked="checked"<?php } ?>>

                    </td>
                    <td style="width:100px" class="p-2 border-r">
                    <input type="radio" <?php if( $rest123['Profun_nec'] ==2) { ?>checked="checked"<?php } ?>></td>
                    <td style="width:100px" class="p-2 border-r">
                     <input type="radio" <?php if( $rest123['Profun_nec'] ==3) { ?>checked="checked"<?php } ?>>

                    </td>
               </tr>
            
              <?php
              }
              ?>
            </tbody>
</table>

<table class=" w-full border">


                <thead>
                <tr>
                <th  colspan="6"  
                class=" w-full border-r p-2">
                                    <h2>RESULTADO DE LA EVALUACIÓN</h2>
                                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
<td rowspan="2">
<strong>El empleado demuestra un desempeño: </strong> 
</td>
                <td style="width:106px" class="  border-r p-2">
                <strong><h2>Muy Alto</h2></strong> 
                </td>
                <td style="width:106px" class="  border-r p-2">
                <strong> <h2>Alto</h2></strong> 
                </td>
                <td style="width:106px"  class="  border-r p-2">
                <strong>  <h2>Medio</h2></strong> 
                </td>
                <td style="width:106px" class="  border-r p-2">
                <strong> <h2>Bajo</h2></strong> 
                </td>
                <td style="width:106px"  class="  border-r p-2">
                  <strong><h2>Muy bajo</h2></strong> 
                </td>
       
                </tr>
                <strong><center>
                <tr>
                <td style="width:106px" class="  border-r p-2">
               
                <strong><center> <label for=""> <?php if( $valoreva>80 && $valoreva<101){ 
                   echo $valoreva;
                   } ?></label></strong></center>
             
                </td>
                <td style="width:106px" class="  border-r p-2">
               
                <strong><center> <label for=""><?php if( $valoreva>60 && $valoreva<80){ 
                    echo  $valoreva;
                    }?></label></strong></center>
                 
                </td>
                <td style="width:106px" class="  border-r p-2">
                
                
                <strong><center><label for=""><?php if(  $valoreva>40 && $valoreva<60){ 
                    echo  $valoreva;
                    }?></label></strong></center>
                </td>

                <td style="width:106px" class="  border-r p-2">
                
                
                <strong><center><label for=""><?php if(  $valoreva>20 && $valoreva<40){
                     echo  $valoreva;
                     }?></label></strong></center>
                </td>
                <td style="width:106px" class="  border-r p-2">
                
                
                <strong><center><label for=""><?php if( $valoreva>0 && $valoreva<20){ 
                    echo  $valoreva;
                    }?></label></strong></center>
                </td>


                </tr>
                </strong></center>
       </tbody>
      
</table>


@endsection

