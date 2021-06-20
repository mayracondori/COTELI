<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Usuario;
use App\Models\departamento;
use DateTime;
use DatePeriod;
use DateInterval;
use PDF;
use QrCode;
use Illuminate\Support\Facades\DB;
class UsuarioController extends Controller
{
           
    public function calendario(){
        // metodo mostrar algo especifico
        return view('usuario.calendario');
        }
    public function micertificadoT()
{
    $data = [
        'titulo' => 'certificado'

    ];


    $pdf = \PDF::loadView('usuario.plantillacertificadopdf2', $data);

    return $pdf->download('MICERTIFICADO.pdf');
}

public function pdfcertificado(Request $request)
{

    $mt=$request->idsolicitud;
    $idsolicitud=$request->idsolicitud;
  session(['pdfcerti' => $mt]);
 
    $coneccion = mysqli_connect ("localhost", "root", "" );
    $basededatos = 'cotel';
      $bd =mysqli_select_db ($coneccion, $basededatos);
      $anti=0;
      $consultita=" SELECT s.id,s.id_usuario,c.id_certificado,c.aprobado_por
      from solicitud as s, certificado as c
      where s.id='$idsolicitud' and s.id=c.id_solicitud ";
      $resultado2=mysqli_query($coneccion,$consultita);

      while($rest2=mysqli_fetch_array($resultado2)){

        $solicitante=$rest2['id_usuario'];
        $cert=$rest2['id_certificado'];
        $codigoresp=$rest2['aprobado_por'];
    }
    $consulta=" SELECT nombres_usu,apellidos_usu
      from usuario
        where codigo_usu='$codigoresp'  ";
      $resultado22=mysqli_query($coneccion,$consulta);

      while($rest22=mysqli_fetch_array($resultado22)){

        $responsable=strtoupper($rest22['nombres_usu'].$rest22['apellidos_usu']);
       
    }
    $hoy = date("d/m/Y-H:i:s"); 

  $contenido =$idsolicitud."-".$solicitante."-".$cert."-".$responsable."-".$hoy;
$nom="../public/qrcodes/qrcode".$idsolicitud.".png";
 QrCode::format('png')->size(100)->generate($contenido,$nom);
return redirect()->route('usuario.pdfmicertificad');







}
public function pdfmicertificad(){
    // metodo mostrar un elemento
    return view('usuario.pdfmicertificad');

}
public function miscertificados(){
    // metodo mostrar un elemento
    return view('usuario.miscertificados');

}
    public function getDepartamentos(Request $request)
    {


        if ($request->ajax()) {
            $departamentos = Usuario::where('nombres_usu', 'like', '%' .$request->id_gerencia. '%')->get();
            //->where('loan_officers', 'like', '%' . $officerId . '%')
            if(count($departamentos)>0){
                foreach ($departamentos as $departamento) {
                    $departamentosArray[$departamento->id] =$departamento->nombres_usu." ". $departamento->apellidos_usu;
                }

            }else{
        $departamentosArray[0] =" No existe usuario";
            }
            return response()->json($departamentosArray);
        }
    }

    public function aceptarsolicitud(Request $request){


        $coneccion = mysqli_connect ("localhost", "root", "" );
        $basededatos = 'cotel';
          $bd =mysqli_select_db ($coneccion, $basededatos);
          $anti=0;
          $consultita=" SELECT nombres_usu,apellidos_usu from usuario where codigo_usu='$request->remitente1'";
          $resultado2=mysqli_query($coneccion,$consultita);
          while($rest2=mysqli_fetch_array($resultado2)){

            $nomr=$rest2['nombres_usu']." ".$rest2['apellidos_usu'];
        }
        $consultita2=" SELECT t.nom_tipoexcepcion from solicitud as s , tipoexcepcion as t where s.id_tipoexcepcion=t.id_tipoexcepcion";
        $resultado22=mysqli_query($coneccion,$consultita2);
        while($rest12=mysqli_fetch_array($resultado22)){

          $excepcion=$rest12['nom_tipoexcepcion'];
      }



          $id=$request->idsolicitud;
         $resp=Solicitud::findOrFail($id) ;
         $resp->id = $request->idsolicitud;
         $resp->fecharespuesta = $request->fecharespuesta;
         $comentariod=$request->comentario;
         if($comentariod==""){
             $comentariod="sin comentario";
         }

         $resp->comentario = strtoupper("$comentariod"." por ".$nomr);
         $hoy = date("d-m-Y H:i:s");
         $remt=$request->remitente1;

         $historial="por empleado : ".$nomr;
       /*  $fecha1= date_create(date($request->fechainicio));
         $fecha2= date_create(date($request->fechafin));
         $diasdif=date_diff($fecha1,$fecha2);*/
         $consult="SELECT Fecha FROM feriados  where estado='1'";
         $feri = mysqli_query($coneccion, $consult);

         $feriados = array();
         $cont = 0;


while ($rest1234 = @mysqli_fetch_array($feri)) {
   $feriados[$cont] = $rest1234['Fecha'];
   $cont++;
}

         $inicio = new DateTime(date( $request->fechainicio));
         $fin = new DateTime(date($request->fechafin));
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



         if($dias<6){

            if($request->boton=="aceptar"){
                $resp->destino = '0';
                $resp->historial_remitentes=" Aprobado ".$historial;
                $resp->historial_fechas=" Aprobado ".$historial." en : ". $hoy;

       }else{
                   $resp->estado='0';
                   $resp->destino='1';
                   $resp->historial_remitentes=" Rechazado ".$historial;
                   $resp->historial_fechas=" Rechazado ".$historial." en : ". $hoy;

       }
         }else{

            if($request->boton=="aceptar"){
                $resp->destino = '2';
                $resp->id_remitente=$request->para;
                $resp->historial_remitentes=" Aprobado ".$historial;
                $resp->historial_fechas=" Aprobado ".$historial." en : ". $hoy;

       }else{
                   $resp->estado='0';
                   $resp->destino='1';
                   $resp->historial_remitentes=" Rechazado ".$historial;
                   $resp->historial_fechas=" Rechazado ".$historial." en : ". $hoy;

       }

         }


          $resp->save();
          return redirect()->route('usuario.index');


        }
    public function index(){
        //metodo inicial
        return view('usuario.index');
    }
    public function poraprobar(){
        // metodo mostrar algo especifico
    return view('usuario.poraprobar');
    }
    public function formaceptar2(){
        // metodo mostrar algo especifico
        return view('usuario.formaceptar2');


    }
    public function download()
{
    $data = [
        'titulo' => 'vgbh'

    ];


    $pdf=\PDF::loadView('usuario.plantillaimpresion', $data);

    return $pdf->download('archivo.pdf');
}
public function imprimir1(Request $request)
{

   $mi=$request->iden;
 session(['imprimir1' => $mi]);
 //$imprimir1 = $request->session()->get('imprimir1');

    return redirect()->route('usuario.imprimir');

}


    public function create(){
        // metodo mostrar un elemento
        return view('usuario.create');

    }

    public function ver(){
        // metodo mostrar algo especifico
        return view('usuario.ver');


    }
    public function plantillacertificadopdf2(){
        // metodo mostrar algo especifico
        return view('usuario.plantillacertificadopdf2');


    }

    public function formulario(){
        // metodo mostrar algo especifico
        return view('usuario.formulario');


    }
    public function permiso(){
        // metodo mostrar algo especifico
        return view('usuario.permiso');
        }

    public function vacaciones(){
            // metodo mostrar algo especifico
            return view('usuario.vacaciones');
            }

    public function comisiones(){
            // metodo mostrar algo especifico
            return view('usuario.comisiones');
            }

    public function boleta(){
             // metodo mostrar algo especifico
             return view('usuario.boleta');
            }
    public function trabajo(){
            // metodo mostrar algo especifico
            return view('usuario.trabajo');
            }
    public function medico(){
            // metodo mostrar algo especifico
            return view('usuario.medico');
            }

          public function aceptadas(){
                // metodo mostrar algo especifico
            return view('usuario.aceptadas');
            }

    public function rechazadas(){
                // metodo mostrar algo especifico
            return view('usuario.rechazadas');
            }
            public function imprimir(){
                // metodo mostrar algo especifico
            return view('usuario.imprimir');
            }
            public function plantillaimpresion(){
                // metodo mostrar algo especifico
            return view('usuario.plantillaimpresion');
            }
    public function pendientes(){
                // metodo mostrar algo especifico
            return view('usuario.pendientes');
            }


            public function info(){
                // metodo mostrar algo especifico
                return view('usuario.info');


            }
            public function listas(){
                // metodo mostrar algo especifico
                return view('usuario.listas');


            }
    public function solboleta(Request $request)
            {
                $boleta = new Solicitud;
                $boleta->id_usuario=$request->id;
                $boleta->id_tiposolicitud='2';
                $boleta->id_tipoexcepcion='4';
                $boleta->fecha_solicitud=$request->fechasolicitud;
                $boleta->fechainicio='';
                $boleta->fechafin='';
                $boleta->id_opcioneslista='19';
                $boleta->destino='0';
                $boleta->estado='2';
                $boleta->comentario='';
                $boleta->fecharespuesta=$request->fecha_solicitud;
                $boleta->horainicio='';
                $boleta->horafin='';
                $boleta->save();
                return redirect()->route('usuario.index');

            }




            public function soltrabajo(Request $request)
            {
                $boleta = new Solicitud;
                $boleta->id_usuario=$request->id;
                $boleta->id_tiposolicitud='3';
                $boleta->id_tipoexcepcion='4';
                $boleta->fecha_solicitud=$request->fechasolicitud;
                $boleta->fechainicio='';
                $boleta->fechafin='';
                $boleta->id_opcioneslista='19';
                $boleta->destino='0';
                $boleta->estado='2';
                
                if($request->comentario!=''){
                    $boleta->comentario=$request->comentario;
                }else {
                    $boleta->comentario="";
                }
                
                $boleta->fecharespuesta=$request->fecha_solicitud;
                $boleta->horainicio='';
                $boleta->horafin='';
                $boleta->save();
                return redirect()->route('usuario.index');

            }


    public function solmedico(Request $request)
            {
                //seguarda la imagen en la carpeta storage->app->public
               $boleta = new Solicitud;
                $boleta->id_usuario=$request->id;
                $boleta->id_tiposolicitud='4';
                $boleta->id_tipoexcepcion='4';
                $boleta->fecha_solicitud=$request->fechasolicitud;
                $boleta->fechainicio=$request->fechainicio;
                $boleta->fechafin=$request->fechafin;
                $boleta->id_opcioneslista='19';
                $boleta->destino='0';
                $boleta->estado='2';
                $boleta->comentario='';
                $boleta->fecharespuesta=$request->fecha_solicitud;
                $boleta->horainicio=strtoupper($request->horainicio);
                $boleta->horafin=strtoupper($request->horafin);

               if($request->hasFile('avatar')){

                $boleta->foto_med=$request->file('avatar')->store('public');

               }


                $boleta->save();
                return redirect()->route('usuario.index');

            }
            public function solpermiso(Request $request)
            {

                $coneccion = mysqli_connect ("localhost", "root", "" );
                $basededatos = 'cotel';
                  $bd =mysqli_select_db ($coneccion, $basededatos);


               $remitente="";
               $consul="SELECT codigo_usu FROM usuario WHERE id='$request->departamento'";
               $resultado2=mysqli_query($coneccion,$consul);
               while($rest2=mysqli_fetch_array($resultado2)){

                 $remitente=$rest2['codigo_usu'];
               }


                $boleta = new Solicitud;
                $boleta->id_usuario=$request->id;
                $boleta->id_tiposolicitud='1';
                $boleta->id_tipoexcepcion='1';
                $boleta->fecha_solicitud=$request->fecha_solicitud;
                $boleta->fechainicio=$request->fechainicio;
                $boleta->fechafin=$request->fechafin;
                $boleta->id_remitente=$remitente;
                $boleta->id_opcioneslista=$request->opcion;
                $boleta->destino='1';
                $boleta->estado='2';
                $boleta->comentario='';
                $boleta->fecharespuesta=$request->fecha_solicitud;
                $boleta->horainicio=strtoupper($request->horainicio);
                $boleta->horafin=strtoupper($request->horafin);
                if($request->hasFile('avatar')){

                    $boleta->foto_med=$request->file('avatar')->store('public');

                   }
                $boleta->save();
                return redirect()->route('usuario.index');
            }

        public function solvacaciones(Request $request)
            {
                $coneccion = mysqli_connect ("localhost", "root", "" );
                $basededatos = 'cotel';
                  $bd =mysqli_select_db ($coneccion, $basededatos);


               $remitente="";
               $consul="SELECT codigo_usu FROM usuario WHERE id='$request->departamento'";
               $resultado2=mysqli_query($coneccion,$consul);
               while($rest2=mysqli_fetch_array($resultado2)){

                 $remitente=$rest2['codigo_usu'];
               }


                $boleta = new Solicitud;
                $boleta->id_usuario=$request->id;
                $boleta->id_tiposolicitud='1';
                $boleta->id_tipoexcepcion='2';
                $boleta->fecha_solicitud=$request->fecha_solicitud;
                $boleta->fechainicio=$request->fechainicio;
                $boleta->fechafin=$request->fechafin;
                $boleta->id_opcioneslista=$request->opvacaciones;
                $boleta->destino='1';
                $boleta->estado='2';
                $boleta->comentario='';
                $boleta->fecharespuesta=$request->fecha_solicitud;
                $boleta->horainicio=$request->horainicio;
                $boleta->horafin=$request->horafin;

                $boleta->id_remitente=$remitente;

                $boleta->save();
                return redirect()->route('usuario.index');

            }

        public function solcomisiones(Request $request)
            {
                $coneccion = mysqli_connect ("localhost", "root", "" );
                $basededatos = 'cotel';
                  $bd =mysqli_select_db ($coneccion, $basededatos);


               $remitente="";
               $consul="SELECT codigo_usu FROM usuario WHERE id='$request->departamento'";
               $resultado2=mysqli_query($coneccion,$consul);
               while($rest2=mysqli_fetch_array($resultado2)){

                 $remitente=$rest2['codigo_usu'];
               }

                $boleta = new Solicitud;
                $boleta->id_usuario=$request->id;
                $boleta->id_tiposolicitud='1';
                $boleta->id_tipoexcepcion='3';
                $boleta->fecha_solicitud=$request->fecha_solicitud;
                $boleta->fechainicio=$request->fechainicio;
                $boleta->fechafin=$request->fechafin;
                $boleta->id_opcioneslista=$request->opcomisiones;
                $boleta->destino='1';
                $boleta->estado='2';
                $boleta->comentario='';
                $boleta->fecharespuesta=$request->fecha_solicitud;
                $boleta->horainicio=$request->horainicio;
                $boleta->horafin=$request->horafin;
                $boleta->id_remitente=$remitente;
                $boleta->save();
                return redirect()->route('usuario.index');

            }

    public function usuarionombre(Request $request){
        //metodo inicial

        //return view('layouts.store');

        $cod=$request->miusuario;


        $coneccion = mysqli_connect ("localhost", "root", "" );
        $basededatos = 'cotel';
          $bd =mysqli_select_db ($coneccion, $basededatos);

          $consultita=" SELECT nombres_usu,apellidos_usu FROM usuario where codigo_usu=$cod  ";
          $resultado2=mysqli_query($coneccion,$consultita);
          while($rest2=mysqli_fetch_array($resultado2)){

            $nomr=$rest2['nombres_usu']." ".$rest2['apellidos_usu'];
        }

        echo"<script>alert('$nomr');</script>";
        return view('usuario.vacaciones');





        }
 }
