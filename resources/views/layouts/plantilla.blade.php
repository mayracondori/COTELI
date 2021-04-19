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
<body onload="startTime()">
    <header class="bg-gray-700 shadow-md">
        <nav class="flex justify-between items-center text-gray-200 px-4 shadow-md sm:py-4 sm:justify-around">
            <div>
                <img src="https://pagos.cotel.bo/assets/admin/img/login.png" class="object-left-top object-scale-down h-16 w-full ">
            </div>
            <div class="sm:hidden text-2xl"></div>
            <ul class="flex">
                <li class="mr-6">
                  <a class="text-3xl text-blue-100 hover:text-blue-100" href="./">SALIR</a>
                </li>

              </ul>
              <div  id="clockdate">
                <div class="clockdate-wrapper">
                  <div id="clock"></div>
                  <div id="date"></div>
                </div>
              </div>
        </nav>



    </header>


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
