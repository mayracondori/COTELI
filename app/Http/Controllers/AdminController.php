<?php

namespace App\Http\Controllers;
use App\Models\usuario;
use App\Models\conpr;
use App\Models\pregunta;
use App\Models\feriado;
use App\Models\bloque;
use App\Models\evaluaciones;
use App\Models\conevapre;
use App\Models\notificacion;
use App\Models\tiporespuesta;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\departamento;
use App\Models\informacion;
use App\Models\anticipacion;
use App\Models\contable;
use App\Models\certificado;
class AdminController extends Controller
{
    public function index(){
        //metodo inicial
        return view('admin.index');
    }
    public function solpermiso(Request $request)
    {
        $boleta = new Solicitud;
        $boleta->id_usuario=$request->id;
        $boleta->id_tiposolicitud='1';
        $boleta->id_tipoexcepcion='1';
        $boleta->fecha_solicitud=$request->fecha_solicitud;
      
        $date = date_create("$request->fechainicio");
        $fechaini =date_format($date,"Y/m/d");
        $boleta->fechainicio=$fechaini;

        $date2 = date_create("$request->fechafin");
        $fechafi =date_format($date2,"Y/m/d");
        $boleta->fechafin=$fechafi;

        $boleta->id_opcioneslista=2;
        $boleta->destino='0';
        $boleta->estado='1';
        $boleta->comentario='';
        $boleta->fecharespuesta=$request->fecha_solicitud;
        $boleta->horainicio="";
        $boleta->horafin="";
        $boleta->save();
        echo"<script>alert('SU PERMISO POR CUMPLEAÑOS FUÉ ACEPTADO');</script>";
       
        return redirect()->route('admin.index');
    }

    public function permisocumple(){
        // metodo mostrar un elemento
        return view('admin.permisocumple');

    }
    public function mostrarlistadepreguntas(){
        // metodo mostrar un elemento
        return view('admin.mostrarlistadepreguntas');

    }
    public function nuevanoti(){
        // metodo mostrar un elemento
        return view('admin.nuevanoti');

    }
    public function nuevaevaluacion(){
        // metodo mostrar un elemento
        return view('admin.nuevaevaluacion');

    }
    public function formulario(){
        // metodo mostrar un elemento
        return view('admin.formulario');

    }
    public function nuevotiporesp(){
        // metodo mostrar un elemento
        return view('admin.nuevotiporesp');

    }
    public function nuevobloque(){
        // metodo mostrar un elemento
        return view('admin.nuevobloque');

    }
    public function fechaevaluacion(){
        // metodo mostrar un elemento
        return view('admin.fechaevaluacion');

    }
    public function evaluaciones(){
        // metodo mostrar un elemento
        return view('admin.evaluaciones');

    }
    public function formapro(){
        // metodo mostrar un elemento
        return view('admin.formapro');

    }
    public function formrepro(){
        // metodo mostrar un elemento
        return view('admin.formrepro');

    }
    public function bolapro(){
        // metodo mostrar algo especifico
        return view('admin.bolapro');


    }
    public function bolrepro(){
        // metodo mostrar algo especifico
        return view('admin.bolrepro');


    }
    public function boleta(){
        // metodo mostrar algo especifico
        return view('admin.boleta');


    }

    public function trabajo(){
        // metodo mostrar algo especifico
        return view('admin.trabajo');


    }
    public function trabapro(){
        // metodo mostrar algo especifico
        return view('admin.trabapro');


    }
    public function trabrepro(){
        // metodo mostrar algo especifico
        return view('admin.trabrepro');


    }
    public function medico(){
        // metodo mostrar algo especifico
        return view('admin.medico');


    }
    public function medapro(){
        // metodo mostrar algo especifico
        return view('admin.medapro');


    }
    public function medrepro(){
        // metodo mostrar algo especifico
        return view('admin.medrepro');


    }


    public function reporte(){
        // metodo mostrar algo especifico
        return view('admin.reporte');


    }
    public function repo(){
        // metodo mostrar algo especifico
        return view('admin.repo');


    }
    public function maps(){
        // metodo mostrar algo especifico
        return view('admin.maps');


    }
    public function reportes(){
        // metodo mostrar algo especifico
        return view('admin.reportes');


    }
    public function reporteseva(){
        // metodo mostrar algo especifico
        return view('admin.reporteseva');


    }

    public function formpend(){
        // metodo mostrar algo especifico
        return view('admin.formpend');


    }
    public function formaceptar(){
        // metodo mostrar algo especifico
        return view('admin.formaceptar');


    }


  public function listausuarios(){
        // metodo mostrar algo especifico
        return view('admin.listausuarios');


    }
    public function listaevaluacionescom(){
        // metodo mostrar algo especifico
        return view('admin.listaevaluacionescom');


    }
    public function listanoti(){
        // metodo mostrar algo especifico
        return view('admin.listanoti');


    }
 public function formmodificar(){
        // metodo mostrar algo especifico
        return view('admin.formmodificar');


    }
    public function info(){
        // metodo mostrar algo especifico
        return view('admin.info');


    }
    public function listadeevaluaciones(){
        // metodo mostrar algo especifico
        return view('admin.listadeevaluaciones');
    }
    public function verevaluacion(){
        return view('admin.verevaluacion');
        }
    public function agre(){
        // metodo mostrar algo especifico
        return view('admin.agre');


    }
    public function detalleferiado(){
        // metodo mostrar algo especifico
        return view('admin.detalleferiado');


    }
    public function feriados(){
        // metodo mostrar algo especifico
        return view('admin.feriados');


    }
    public function anticipacion(){
        // metodo mostrar algo especifico
        return view('admin.anticipacion');


    }
    public function lista(){
        // metodo mostrar algo especifico
        return view('admin.lista');


    }
    public function editaranticipacion(){
        // metodo mostrar algo especifico
        return view('admin.editaranticipacion');


    }
    public function listadepreguntas(){
        // metodo mostrar algo especifico
        return view('admin.listadepreguntas');


    }
    public function feriadonuevo(){
        // metodo mostrar algo especifico
        return view('admin.feriadonuevo');


    }
    public function formal(){
        // metodo mostrar algo especifico
        return view('admin.formal');


    }


    public function trabajoaceptar(){
        // metodo mostrar algo especifico
        return view('admin.trabajoaceptar');


    }
    public function crearcertificado(){
        // metodo mostrar algo especifico
        return view('admin.crearcertificado');


    }


    public function modifpreguntas(Request $request){
        if($request->boton=="HABILITAR"){
            $estado =1;
        }else{
               $estado=0;
             }

          $id=$request->Id_pre;
          pregunta::where('Id_pre', $id)
        ->update(['Estado_pre' => $estado]);
        return redirect()->route('admin.listadepreguntas');


    }
    public function crearnuevotipores(Request $request)
    {
       

        $tr = new tiporespuesta;
        $tr->Estado_tipores=1;
        $tr->Nom_tipores=$request->Nom_tipores;
                       
        $tr->save();
        return redirect()->route('evaluaciones');


    }
    public function crearnuevobloque(Request $request)
    {
       

        $bl = new bloque;
        $bl->Nom_bloque=$request->Nom_bloque;
                       
        $bl->save();
        return redirect()->route('evaluaciones');


    }
    public function modificarevaluacion(Request $request){
        

          $fi=$request->Fechaini;
          $ff=$request->Fechafin;
          bloque::where('estado', '<',2)->update(['Fecha_inicio' => $fi]);
          bloque::where('estado', '<',2)->update(['Fecha_fin' => $ff]);
          
        return redirect()->route('admin.fechaevaluacion');


    }
    public function enviarcertificado(Request $request)
    {
       

        $certificado = new certificado;
        $certificado->id_usuario=$request->idusuariosolicitante;
        $certificado->titulo=strtoupper($request->titulo);
        $certificado->contenido=$request->contenido;
        $certificado->id_solicitud=$request->idsolicitud;
        $certificado->fecha=$request->fecha;
        $certificado->aprobado_por=$request->aprobadopor;
                       
        $certificado->save();
        $id=$request->idsolicitud;
        $resp=Solicitud::findOrFail($id) ;

        $resp->estado = 1;
         $resp->save();
        return redirect()->route('admin.index');


        }

            public function enviarcontabilidad(Request $request)
            {
               

                $contable = new contable;
                $contable->comen_sol=$request->comensol;
                $contable->id_solicitud=$request->idsolicitud;
               // $contable->fecha=$request->fecha;
                $contable->enviado_por=$request->enviadopor;
                $contable->estado=2;
                
                $contable->save();
                return redirect()->route('admin.trabajo');


            }
            public function guardarconpr(Request $request)
            {
                $codigo= session('codigo_usu');
                $coneccion = mysqli_connect ("localhost", "root", "" );
                $basededatos = 'cotel';
                $bd =mysqli_select_db ($coneccion, $basededatos);
             
                        $codigo = "select * from usuario where codigo_usu=$codigo";
                        $resultado = mysqli_query($coneccion, $codigo);
                        while ($rest = mysqli_fetch_array($resultado)) {
                            $id=$rest['id'];
                        }

                $pre = new pregunta;
                
                $pre->Id_usu=$id;
                
                $pre->Titulo_pre=$request->Titulo_pre;
                $pre->Pregunta_pre=$request->Pregunta_pre;
                $pre->Estado_pre=1;
                $pre->Id_bloque=$request->Id_bloque;
                $pre->save();
                $mipre=$request->Pregunta_pre;

                $codigo1 = "select * from preguntas where Pregunta_pre='$mipre'";
                $resultado1 = mysqli_query($coneccion, $codigo1);
                while ($rest1 = mysqli_fetch_array($resultado1)) {
                    $idpregu=$rest1['Id_pre'];
                }
                $conpr1 = new conpr;
                $conpr1->Id_pre=$idpregu;
                $conpr1->Id_tiporesp=1;
                $conpr1->save();
                $conpr2 = new conpr;
                $conpr2->Id_pre=$idpregu;
                $conpr2->Id_tiporesp=2;
                $conpr2->save();
                $conpr3 = new conpr;
                $conpr3->Id_pre=$idpregu;
                $conpr3->Id_tiporesp=3;
                $conpr3->save();
                $conpr4 = new conpr;
                $conpr4->Id_pre=$idpregu;
                $conpr4->Id_tiporesp=4;
                $conpr4->save();
                $conpr5 = new conpr;
                $conpr5->Id_pre=$idpregu;
                $conpr5->Id_tiporesp=5;
                $conpr5->save();
                 
                             

                return redirect()->route('admin.listadepreguntas');


            }
            public function guardarconpr2(Request $request)
            {
                $codigo= session('codigo_usu');
                $coneccion = mysqli_connect ("localhost", "root", "" );
                $basededatos = 'cotel';
                $bd =mysqli_select_db ($coneccion, $basededatos);
             
                        $codigo = "select * from usuario where codigo_usu=$codigo";
                        $resultado = mysqli_query($coneccion, $codigo);
                        while ($rest = mysqli_fetch_array($resultado)) {
                            $id=$rest['id'];
                        }

                $pre = new evaluaciones;
                $pre->Fechaini=$request->Fechaini;
                $pre->Fechafin=$request->Fechafin;
                $pre->Id_tipoeva=$request->Id_tipoeva;
                $pre->save();

                $fechaini=$request->Fechaini;
                $fechafin=$request->Fechafin;
                $idte=$request->Id_tipoeva;

                $codigo1 = "select * from evaluaciones where Fechaini='$fechaini' and Fechafin='$fechafin' and Id_tipoeva='$idte'";
                $resultado1 = mysqli_query($coneccion, $codigo1);
                while ($rest1 = mysqli_fetch_array($resultado1)) {
                    $idevacom=$rest1['Id_evacom'];
                }
                foreach($request->pregunta as $selected){
     
                    $res = new conevapre;
                    $res->Id_evacom=$idevacom;
                    $res->Id_pre=$selected;
                    $res->save();
                }
                             

                return redirect()->route('admin.listaevaluacionescom');


            }
           
           

            public function certificadopasouno(Request $request){


                $coneccion = mysqli_connect ("localhost", "root", "" );
                $basededatos = 'cotel';
                  $bd =mysqli_select_db ($coneccion, $basededatos);
                  $hoy = date("d-m-Y H:i:s");       
                  $consultita=" SELECT nombres_usu,apellidos_usu from usuario where codigo_usu='$request->remitente3'";
                  $resultado2=mysqli_query($coneccion,$consultita);
                  while($rest2=mysqli_fetch_array($resultado2)){
                  
                    $nomr=$rest2['nombres_usu']." ".$rest2['apellidos_usu'];
                }
        $comentariod=$request->comentario;
        if($comentariod==""){
            $comentariod="sin comentario";
        }
        
        $id=$request->idsolicitud;
        
                 if($request->boton=="aceptar"){
                    session(['codigoempleadocer' => $request->codigoempleado]);
                    session(['misolicitud' => $id]);
                  
                 
                    return redirect()->route('admin.crearcertificado');
        
                  }else{
                      
                 
                  $resp=Solicitud::findOrFail($id) ;
                  $resp->id = $request->idsolicitud;
                  $resp->fecharespuesta = $request->fecharespuesta;
                  $resp->comentario = strtoupper("$comentariod"." por ".$nomr);
                 
                  $historial=" por encargado de RRHH : ".$nomr;
         
                              $resp->estado='0';
                              $resp->historial_remitentes="Rechazado ".$historial;
                              $resp->historial_fechas_RRHH="Rechazado ".$historial." en : ". $hoy;
                        
                  }
                  $resp->save();
                  return redirect()->route('admin.index');
        
        
              }
      public function certificadopasodos(Request $request){


    
        session(['codigosolicitante' => $request->codigoempleado]);
        session(['idsolicituds' => $request->idsolicitud]);
        
        
                 if($request->boton=="aceptar"){
                  
                 
                    return redirect()->route('admin.formatocertificado');
        
                  }else{
                   
                    return redirect()->route('admin.contabilidad');
        
        
                          }
                  
                 
              }
              public function formatocertificado(){
                // metodo mostrar un elemento
                return view('admin.formatocertificado');

            }
            public function contabilidad(){
                // metodo mostrar un elemento
                return view('admin.contabilidad');

            }
    public function regis(Request $request)
            {
                $boleta = new informacion;
                $boleta->id_tipoinfo=$request->tipo;
                $boleta->titulo=strtoupper($request->titulo);
                $boleta->descripcion=nl2br($request->descripcion);
                $boleta->link=$request->link;
                $boleta->save();
                return redirect()->route('admin.info');


            }
            public function regisnoti(Request $request)
            {
                $n = new notificacion;
                $n->titulo_noti=strtoupper($request->titulo);
                $n->contenido_noti=nl2br($request->descripcion);
                $n->fechaini=$request->inicio;
                $n->fechafin=$request->fin;
                $n->save();
                return redirect()->route('admin.info');


            }
            public function fineditaranticipacion(Request $request)
            {
                $id=$request->id;
                $resp=anticipacion::findOrFail($id) ;
                if($request->dias!=""){
                $resp->numero_dias = $request->dias;
                }
                 $resp->save();
                 return redirect()->route('admin.anticipacion');


            }
      public function nuevoferiadoform(Request $request)
            {
                $coneccion = mysqli_connect ("localhost", "root", "" );
                $basededatos = 'cotel';
                  $bd =mysqli_select_db ($coneccion, $basededatos);

                $consultita=" SELECT id from usuario where codigo_usu='$request->usu'";
                $resultado2=mysqli_query($coneccion,$consultita);
                while($rest2=mysqli_fetch_array($resultado2)){

                  $usuario=$rest2['id'];
              }

                $feriado = new feriado;
                $feriado->Fecha=$request->fecha;
                $feriado->Descripcion=strtoupper($request->descripcion);
                $feriado->estado=nl2br($request->estado);
                $feriado->id_usuario=$usuario;
                $feriado->save();
                return redirect()->route('admin.feriados');


            }

 public function modificarusuario(Request $request){


        $coneccion = mysqli_connect ("localhost", "root", "" );
        $basededatos = 'cotel';
          $bd =mysqli_select_db ($coneccion, $basededatos);

          $id=$request->id;
         $resp=usuario::findOrFail($id) ;

         $resp->id_tipousuario = $request->tipousuarionuevo;
          $resp->save();
          return redirect()->route('admin.index');


      }


      public function fineditarferiado(Request $request){


        $coneccion = mysqli_connect ("localhost", "root", "" );
        $basededatos = 'cotel';
          $bd =mysqli_select_db ($coneccion, $basededatos);

          $id=$request->id;
         $resp=feriado::findOrFail($id) ;
         if($request->fecha!=""){
         $resp->Fecha = $request->fecha;
         }
         if($request->descripcion!=""){
         $resp->Descripcion = $request->descripcion;
         }
         if($request->estado =="0"||$request->estado =="1"){
         $resp->estado = $request->estado;
         }
          $resp->save();
          return redirect()->route('admin.feriados');


      }




    public function bolaceptar(){
        // metodo mostrar algo especifico
        return view('admin.bolaceptar');


    }
    public function medaceptar(){
        // metodo mostrar algo especifico
        return view('admin.medaceptar');


    }
    public function listas2(){
        // metodo mostrar algo especifico
        return view('admin.listas2');


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
    public function aceptarsolicitud(Request $request){


        $coneccion = mysqli_connect ("localhost", "root", "" );
        $basededatos = 'cotel';
          $bd =mysqli_select_db ($coneccion, $basededatos);
          $hoy = date("d-m-Y H:i:s");
          $consultita=" SELECT nombres_usu,apellidos_usu from usuario where codigo_usu='$request->remitente3'";
          $resultado2=mysqli_query($coneccion,$consultita);
          while($rest2=mysqli_fetch_array($resultado2)){

            $nomr=$rest2['nombres_usu']." ".$rest2['apellidos_usu'];
        }
$comentariod=$request->comentario;
if($comentariod==""){
    $comentariod="sin comentario";
}

          $id=$request->idsolicitud;
         $resp=Solicitud::findOrFail($id) ;
         $resp->id = $request->idsolicitud;
         $resp->fecharespuesta = $request->fecharespuesta;

         $com1=$request->comentarioger;
         $resp->comentario = strtoupper($com1." "."$comentariod"." por ".$nomr);
         $remt=$request->remitente2;
         $hr=$request->historialremit;


         $historial=" por encargado de RRHH : ".$nomr;



         if($request->boton=="aceptar"){
                   $resp->estado = '1';
                   $resp->historial_remitentes=$hr." -- Aprobado ".$historial;
                   $resp->historial_fechas_RRHH=" Aprobado ".$historial." en : ". $hoy;

          }else{
                      $resp->estado='0';
                      $resp->historial_remitentes=$hr." -- Rechazado ".$historial;
                      $resp->historial_fechas_RRHH=" Rechazado ".$historial." en : ". $hoy;

          }
          $resp->save();
          return redirect()->route('admin.index');


      }

}
