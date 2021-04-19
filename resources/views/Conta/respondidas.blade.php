@extends('layouts.plantilla')
@section('title','usuario')

@section('content')

<meta name="description" content="">
<meta name="keywords" content="">
<link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
<!--Replace with your tailwind.css once created-->


<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">


</head>

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">


<!--Container-->
<div class="container w-full md:w-4/5 xl:w-4/5  mx-auto px-2">

      <!--Title-->
      <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
      SOLICITUDES DE RECURSOS HUMANOS --  DATOS CONTABLES
      </h1>




      <!--Card-->
       <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


          <table id="example" class=" text-center stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
              <thead>

                  <tr>
                      <th data-priority="1">N°</th>
                      <th data-priority="2">DETALLES</th>

                      <th data-priority="3">ORDEN</th>
                      <th data-priority="4">FECHA</th>
                      <th data-priority="4">ESTADO</th>
                      <th>FORMULARIO</th>

                  </tr>
              </thead>

              <tbody>
              <?php
$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);

$codigo = "SELECT * FROM contable where estado=1";
$resultado = mysqli_query($coneccion, $codigo);

while ($rest = mysqli_fetch_array($resultado)) {
 

?>
                  <tr>
                  <form method="GET" action="{{'formaceptar'}}">
                      <td><?php echo $rest ['id']; ?></td>
                      <td><?php echo $rest ['cobro']; ?></td>
                      <td><?php echo $rest ['orden']; ?></td>
                      <td><?php echo $rest ['fecha']; ?></td>
                      <td><?php
                        $aux=$rest ['estado'];
                        $nom='';
                        if($aux==1){
                            $nom='Aceptado';
                        }else{
                            if($aux==0){
                                $nom='Negado';
                            }else{

                                   $nom='Pendiente';


                            }
                        }
                        echo $nom;?></td>
                      
                        <td><input type="hidden" name="id" value="<?php echo $rest['id']; ?>">
                        </td>

                      </form>

                  </tr>
              <!--/Card-->
      <?php
  }

  ?>
              </tbody>
          </table>
      </div>
</div>
<!--/container-->
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
  $(document).ready(function() {

      var table = $('#example').DataTable( {
              responsive: true
          } )
          .columns.adjust()
          .responsive.recalc();
  } );

</script>

</body>
@endsection
