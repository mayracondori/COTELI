<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\departamento;
class HomeController extends Controller
{
    public function __invoke()
    {
        return view('index');
        //return "bienvenido";
    }
    public function consultaregistro(){
        //metodo inicial
        return view('consultaregistro');
    }

    public function getDepartamentos(Request $request)
    {


        if ($request->ajax()) {
            $departamentos = departamento::where('id_gerencia', $request->id_gerencia)->get();
            foreach ($departamentos as $departamento) {
                $departamentosArray[$departamento->id_departamento] = $departamento->nom_depto;
            }
            return response()->json($departamentosArray);
        }
    }



    public function store(Request $request){
        //metodo inicial

        //return view('layouts.store');

        $codigointroducido=$request->codigoempleado;


        $validacioncodigo = DB::table('usuario')->where(['codigo_usu'=>$codigointroducido])->get();


        if(count($validacioncodigo)>0){

            //echo "Este codigo de empleado ya tiene un cuenta creada, inicie sesion en esa cuenta";
           echo"<script>
           alert('EL CODIGO DE USUARIO YA SE ENCUENTRA REGISTRADO');
           </script>
          ";
          return view('index');



        }else{

        $usuario = new Usuario;
        $usuario->nombres_usu =strtoupper($request->nombre);
        $usuario->apellidos_usu=strtoupper($request->apellido);
        $usuario->correo_usu=$request->correo;
        $usuario->ci_usu=$request->ci;
        $usuario->celular_usu=$request->celular;
        $usuario->codigo_usu=$request->codigoempleado;
        $usuario->contraseña_usu=$request->contraseña;
        $usuario->id_tipousuario='1';
        $usuario->id_gerencia=$request->gerencia;
        //$objeto_DateTime = DateTime::createFromFormat('Y-m-d', $cadena_fecha_mysql);

    $newDate = date("Y-m-d", strtotime($request->fechaingreso));
        $usuario->id_departamento=$request->departamento;
        $usuario->fingreso=$newDate;
        $usuario->cc=$request->cc;
        $usuario->estado='1';
        $usuario->save();
        return redirect()->route('index');
        }

    }
    public function registro(){
        //metodo inicial
        return view('registro');
    }
    public function finalizaregistro(){
        //metodo inicial
        return view('finalizaregistro');
    }


    public function mon(){
        //metodo inicial
        return view('mon');
    }
    public function completaregistro (Request $req )
 {
    $codigo_usu = $req->input('codigo_usu');
    $carnet =$req->input('carnet');

$validacion = DB::table('datos_usu')->where(['Codigo'=>$codigo_usu,'Ci'=>$carnet])->get();

if(count($validacion)>0){
// echo "si hay un registro";
 session(['codigo_usu' => $codigo_usu]);
    $codigo = $req->session()->get('codigo_usu');
   // echo $codigo;
   return view('finalizaregistro');


}else{
   // return view('usuario.index');
    echo "no hay un registro";


 }
}

public function login(Request $req )
{
   $dbhost	= "localhost";	   // localhost or IP
   $dbuser	= "root";		  // database username
   $dbpass	= "";		     // database password
   $dbname	= "cotel";    // database name
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

   $codigo_usu = $req->input('codigo_usu');
   $contraseña_usu =$req->input('contraseña_usu');

   session_start();
   //contador de intentos
   if(!isset($_SESSION['contador']))
   {
       $_SESSION['contador'] = 0;
   }
   //validacion si la sesion ya fue iniciada

       $validacion789 = DB::table('usuario')->where(['codigo_usu'=>$codigo_usu,'contraseña_usu'=>$contraseña_usu])->get();

          $sql = mysqli_query($conn, "SELECT * FROM usuario WHERE codigo_usu = '$codigo_usu' AND contraseña_usu = '$contraseña_usu'");
           $resultado = mysqli_num_rows($sql);

           if(count($validacion789)>0)
           {
               $_SESSION['contador'] = 0;
              $_SESSION['active'] = true;

date_default_timezone_set("America/La_Paz");
$desde = 00; # Desde las ocho de la mañana
$hasta = 24; # Hasta las 18
$lunes = 1; $martes =2; $miercoles =3; $jueves =4; $viernes = 5;
$dia_actual = intval(date("w"));
$hora_actual = intval(date("H"));
if ($hora_actual >= $desde && $hora_actual < $hasta) {
   if ($dia_actual == $lunes || $dia_actual == $martes || $dia_actual == $miercoles || $dia_actual == $jueves || $dia_actual == $viernes) {

    } else {
        echo"<script>alert('NO SE PERMITE EL INGRESO EN ESTE HORARIO, SOLO SE PERMITE DE LUNES A VIERNES DE 8:00 am A 18:30pm');</script>";
        return view('index');
    }

}else{

        echo"<script>alert('NO SE PERMITE EL INGRESO EN ESTE HORARIO, SOLO SE PERMITE DE LUNES A VIERNES DE 8:00 am A 18:30pm');</script>";
        return view('index');
    }

    $validacion45671 = DB::table('usuario')->where(['codigo_usu'=>$codigo_usu,'contraseña_usu'=>$contraseña_usu,'estado'=>'4'])->get();

if(count($validacion45671)>0){
   echo"<script>alert('SU CUENTA FUE BLOQUEADA POR 3 INTENTOS FALLIDOS, COMUNIQUESE CON RECURSOS HUMANOS PARA HABILITAR SU CUENTA');</script>";
   return view('index');



}else{



   $validacion = DB::table('usuario')->where(['codigo_usu'=>$codigo_usu,'contraseña_usu'=>$contraseña_usu,'id_tipousuario'=>'1'])->get();

   if(count($validacion)>0){

       session(['codigo_usu' => $codigo_usu]);
       $codigo = $req->session()->get('codigo_usu');
       return view('usuario.index');
     //  return redirect()->route('usuario.index');
      // print_r($req->input('codigo_usu'));
   }else{


      $validacion2 = DB::table('usuario')->where(['codigo_usu'=>$codigo_usu,'contraseña_usu'=>$contraseña_usu,'id_tipousuario'=>'4'])->get();


       if(count($validacion2)>0){

       session(['codigo_usu' => $codigo_usu]);
       $codigo = $req->session()->get('codigo_usu');
       return view('admin.index');
       echo"<script>alert('BIENVENIDO');</script>";
       }else{

           $validacion3 = DB::table('usuario')->where(['codigo_usu'=>$codigo_usu,'contraseña_usu'=>$contraseña_usu,'id_tipousuario'=>'3'])->get();


           if(count($validacion3)>0){

           session(['codigo_usu' => $codigo_usu]);
           $codigo = $req->session()->get('codigo_usu');
           echo"<script>alert('BIENVENIDO');</script>";
            return view('gerente.index');

           echo "gerente";

           }else{

           //echo "esta cuenta o contrasenia no es valida";
           $validacion4= DB::table('usuario')->where(['codigo_usu'=>$codigo_usu,'contraseña_usu'=>$contraseña_usu,'id_tipousuario'=>'2'])->get();


           if(count($validacion4)>0){
               echo"<script>alert('BIENVENIDO');</script>";
           session(['codigo_usu' => $codigo_usu]);
           $codigo = $req->session()->get('codigo_usu');
           return view('conta.index');
           echo "conta";

           }

       }
       }
   }







}







            }else
           {
               $validacion4847 = DB::table('usuario')->where(['codigo_usu'=>$codigo_usu])->get();



               if(count($validacion4847)>0){

   echo"<script>
   alert('ERROR DE CONTRASEÑA');
   </script>
  ";

  $_SESSION['contador']++;
  $contador=$_SESSION['contador'];echo"<script>
  alert('Usted realizo ".$contador." intentos');
  </script>
 ";
  if($contador == 3)
  {
      echo"<script>
      alert('Llego al limite de intentos');
      </script> ";
     session_destroy();

     $coneccion = mysqli_connect ("localhost", "root", "" );
     $basededatos = 'cotel';
       $bd =mysqli_select_db ($coneccion, $basededatos);

    $consul87="SELECT id FROM usuario WHERE codigo_usu='$codigo_usu'";
    $resultado287=mysqli_query($coneccion,$consul87);
    while($rest287=mysqli_fetch_array($resultado287)){

      $id=$rest287['id'];
    }

     $resp=Usuario::findOrFail($id) ;
     $resp->estado = 4;
     $resp->save();

      return view('index');

  }else{

      return view('index');


  }



}else{
   echo"<script>
   alert('EL USUARIO NO EXISTE');
   </script>
  ";

  $_SESSION['contador']++;
  $contador=$_SESSION['contador'];echo"<script>
  alert('Usted realizo ".$contador." intentos');
  </script>
 ";
  if($contador == 3)
  {
      echo"<script>
      alert('Llego al limite de intentos');
      </script> ";
     session_destroy();

      return view('index');

  }else{

      return view('index');


  }
}



           }



   }
}
