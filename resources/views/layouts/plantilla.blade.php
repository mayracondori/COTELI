<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  <meta http-equiv="refresh" content="5" />-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


    <title> @yield('title') Cotel</title>

</head>
<?php
$codigo= session('codigo_usu');

$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
$codigo2 = " SELECT u.id, u.nombres_usu,u.apellidos_usu,u.codigo_usu, DAY(u.Fnac) as dnac,MONTH(u.Fnac) as mnac FROM usuario u WHERE u.codigo_usu=$codigo ";
$resultado2 = mysqli_query($coneccion, $codigo2);
while ($rest2 = mysqli_fetch_array($resultado2)) {
    $idusu=$rest2['id'];
    $nombres=$rest2['nombres_usu'];
    $apellidos=$rest2['apellidos_usu'];
    $dnac=$rest2['dnac'];
    $mnac=$rest2['mnac'];
    

}
$mes = date("m");
$dia = date("d");  
 
?>
<body onload="startTime()">
    <header class="bg-gray-700 shadow-md">
        <nav class="flex justify-between items-center text-gray-200 px-4 shadow-md sm:py-4 sm:justify-around">
            <div>
                <img src="{{url('../img/login.png')}}" class="object-left-top object-scale-down h-16 w-full ">
            </div>
            <h6>Cuenta de: <?php  echo strtoupper($nombres." ".$apellidos)?></h6>
              
            <div class="sm:hidden text-2xl"></div>
            <ul class="flex">
            
                <li class="mr-6">
                  <a class="text-3xl text-blue-100 hover:text-blue-100" href="./">ATRÁS</a>
                </li>
                <li class="mr-6"> 
                 <a class="text-3xl text-blue-100 hover:text-blue-100" href="{{route('layouts/cerrarsesion')}}">Cerrar Sesión</a>
              
                </li>

              </ul>
              <div  id="clockdate">
                <div class="clockdate-wrapper">
                  <div id="clock"></div>
                  <div id="date"></div>
                </div>
              </div>
              <div x-data="{ dropdownOpen: false }" class="s">
        <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
            <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
            </svg>
        </button>

        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

        <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
            <div class="py-2">
             <?php  
            if ($mnac==$mes && $dnac==$dia){

               ?>
                <a onclick="toggleModal('CUMPLE')" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                    <img class="h-8 w-8 rounded-full object-cover mx-1" src="{{url('../img/login.png')}}" >
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-bold" href="#">FELÍZ CUMPLEAÑOS TE DESEA COTEL</span> 
                    </p>
                </a>
                <div  class=" hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="CUMPLE">
                        <div  class="relative w-auto my-6 mx-auto max-w-3xl">
                            <!--content-->
                            
                                <div  style="justify-content:center" class=" bg-blueGray-200 border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                 <!--header-->
                                 
                                            <div style="background-image:url(https://img.freepik.com/vector-gratis/globos-feliz-cumpleanos-estilo-plano-fondo-confeti_1017-29990.jpg?size=626&ext=jpg)"class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                                                <h3 style="color:black" class="text-3xl  font-semibold ">
                                                FELIZ CUMPLEAÑOS <?php echo strtoupper($nombres) ?>
                                                </h3>
                                                <button class="p-1 ml-auto bg-transparent border-0  opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('CUMPLE')">
                                              <span  style="color:black" class="bg-transparent  opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                X
                                              </span>
                                              </button>
                                            </div>
                                                
                                                  
                                        <div  style="color:black"  style=" width:750px; height:230px;;  ;background-color:white; " class="relative p-6 flex-auto">
                                                <p class="my-4 text-blueGray-500  text-lg leading-relaxed">
                                                La Cooperativa  de Telecomunicaciones COTEL R.L. te desea todo lo mejor en este dia, gracias por tu gran desempeño en la empresa
                                            
                                        </div>
                                        
                         

                                </div>
                                
                        </div>
                        
            </div>

             <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="<?php echo "CUMPLE1"; ?>"></div>
             </div>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script type="text/javascript">
  function toggleModal(modalID){
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "1").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "1").classList.toggle("flex");
  }
</script>
                <?php  }
               ?>
               
            </div>
        </div>
    </div>

        </nav>



    </header>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


  

    <div id="whatsapp-icon" style="position:fixed; left:30px; bottom:10px; text-align:center; padding:10px">
        <a href="https://api.whatsapp.com/send?phone=59167208815&text=Problemas%20con%20el%20sistema%20de%20solicitudes.">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/240px-WhatsApp.svg.png" width="50" height="50"><p class="text-black">Soporte Técnico</p></a>
    </div>


        @yield('content')


        <?php
        $coneccion = mysqli_connect ("localhost", "root", "" );
        $basededatos = 'cotel';
        $bd =mysqli_select_db ($coneccion, $basededatos);
        ?>
    <footer style="bottom: 0" class="text-center text-white bg-gray-700  py-6">
        <ul class="md:flex justify-center">


            <li><a href="http://">Cotel R.L. &nbsp;</a></li>
            <script>
                var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                var f=new Date();
                document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                </script>

        </ul>

    </footer>

    @yield('script')
    @yield('script2')
    @yield('script3')




</body>
</html>
<script>
    function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;

    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Dom.', 'lun', 'mart', 'miérc', 'juev', 'vier', 'sáb'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;

    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
</script>

<script type="text/javascript" language="Javascript">
    document.oncontextmenu = function(){return false}
    </script>
<style>

#clock{



    font-size:20px;
    text-shadow:0px 0px 1px #fff;
    color:#fff;
}


</style>
