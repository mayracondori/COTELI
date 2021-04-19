<?php

namespace App\Http\Controllers;
use App\Models\usuario;
use App\Models\feriado;
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

    public function formulario(){
        // metodo mostrar un elemento
        return view('admin.formulario');

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
    public function reportes(){
        // metodo mostrar algo especifico
        return view('admin.reportes');


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
 public function formmodificar(){
        // metodo mostrar algo especifico
        return view('admin.formmodificar');


    }
    public function info(){
        // metodo mostrar algo especifico
        return view('admin.info');


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
