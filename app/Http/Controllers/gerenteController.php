<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Solicitud;

use App\Models\Evaluacion;
use App\Models\Respuesta;
use App\Models\Necesidad;
use PDF;
use QrCode;
use Illuminate\Support\Facades\DB;
class gerenteController extends Controller
{

    public function getDepartamentos(Request $request)
    {



        $codigoeva= session('codigo_usu');
        $coneccion = mysqli_connect ("localhost", "root", "" );
        $basededatos = 'cotel';
        $bd =mysqli_select_db ($coneccion, $basededatos);
         
                $codigo2 = " SELECT id_gerencia FROM usuario WHERE codigo_usu=$codigoeva ";
                $resultado2 = mysqli_query($coneccion, $codigo2);
                while ($rest2 = mysqli_fetch_array($resultado2)) {
                    $ger=$rest2['id_gerencia'];
                  
        
                }
        

        if ($request->ajax()) {
           // $departamentos = Usuario::where(['nombres_usu', 'like', '%' .$request->id_gerencia. '%'])->get();
            
            $departamentos = Usuario::where('nombres_usu', 'like', '%' .$request->id_gerencia. '%')
            ->where('id_gerencia','=',$ger)
            ->where('Estado_eva','=',0)
            ->where('id_tipousuario','=',1)
            ->get();
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
    
    public function micertificadoT()
    {
        $data = [
            'titulo' => 'certificado'
    
        ];
    
    
        $pdf = \PDF::loadView('gerente.plantillacertificadopdf2', $data);
    
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
return redirect()->route('gerente.pdfmicertificad');







}
public function plantillacertificadopdf2(){
    // metodo mostrar algo especifico
    return view('gerente.plantillacertificadopdf2');


}
public function pdfmicertificad(){
    // metodo mostrar un elemento
    return view('gerente.pdfmicertificad');

}
public function miscertificados(){
    // metodo mostrar un elemento
    return view('gerente.miscertificados');

}
    public function listaevaluaciones(){
        return view('gerente.listaevaluaciones');
        } 
        public function evaluacion(){
            return view('gerente.evaluacion');
            }
            
            
    public function index(){
        return view('gerente.index');
        }

    public function boleta(){
        return view('gerente.boleta');
        }

    public function comisiones(){
        return view('gerente.comisiones');
        }

    public function formulario(){
        return view('gerente.formulario');
        }

    public function medico(){
        return view('gerente.medico');
        }

    public function permiso(){
        return view('gerente.permiso');
        }

    public function trabajo(){
        return view('gerente.trabajo');
        }

    public function vacaciones(){
        return view('gerente.vacaciones');
         }

    public function ver(){
        return view('gerente.ver');
        }

        public function aceptadas(){
            // metodo mostrar algo especifico
        return view('gerente.aceptadas');
        }

        public function rechazadas(){
            // metodo mostrar algo especifico
        return view('gerente.rechazadas');
        }

        public function pendientes(){
            // metodo mostrar algo especifico
        return view('gerente.pendientes');
        }

        public function poraprobar(){
            // metodo mostrar algo especifico
        return view('gerente.poraprobar');
        }
        public function formaceptar(){
            // metodo mostrar algo especifico
            return view('gerente.formaceptar');


        }
        public function bolaceptar(){
            // metodo mostrar algo especifico
            return view('gerente.bolaceptar');


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
                return redirect()->route('gerente.index');

            }

    public function soltrabajo(Request $request)
            {
                $boleta = new Solicitud;
                $boleta->id_usuario=$request->id;
                $boleta->id_tiposolicitud='3';
                $boleta->id_tipoexcepcion='4';
                $boleta->fecha_solicitud=$request->fechasolicitud;
                $boleta->id_opcioneslista='19';
                $boleta->destino='0';
                $boleta->estado='2';
                $boleta->comentario='';
                $boleta->fecharespuesta=$request->fecha_solicitud;
                $boleta->horainicio='';
                $boleta->horafin='';
                $boleta->save();
                return redirect()->route('gerente.index');

            }

    public function solmedico(Request $request)
            {
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
                $boleta->horainicio=$request->horainicio;
                $boleta->horafin=$request->horafin;
                $boleta->save();
                return redirect()->route('gerente.index');

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

                $boleta->id_opcioneslista=$request->opcion;
                $boleta->destino='0';
                $boleta->estado='2';
                $boleta->comentario='';
                $boleta->fecharespuesta=$request->fecha_solicitud;
                $boleta->horainicio=$request->horainicio;
                $boleta->horafin=$request->horafin;
                $boleta->save();
                return redirect()->route('gerente.index');
            }

        public function solvacaciones(Request $request)
            {
                $boleta = new Solicitud;
                $boleta->id_usuarop=$request->id;
                $boleta->id_tiposolicitud='1';
                $boleta->id_tipoexcepcion='2';
                $boleta->fecha_solicitud=$request->fecha_solicitud;
                $boleta->fechainicio=$request->fechainicio;
                $boleta->fechafin=$request->fechafin;
                $boleta->id_opcioneslista=$request->opvacaciones;
                $boleta->destino='0';
                $boleta->estado='2';
                $boleta->comentario='';
                $boleta->fecharespuesta=$request->fecha_solicitud;
                $boleta->horainicio=$request->horainicio;
                $boleta->horafin=$request->horafin;
                $boleta->save();
                return redirect()->route('gerente.index');

            }

        public function solcomisiones(Request $request)
            {
                $boleta = new Solicitud;
                $boleta->id_usuario=$request->id;
                $boleta->id_tiposolicitud='1';
                $boleta->id_tipoexcepcion='3';
                $boleta->fecha_solicitud=$request->fecha_solicitud;
                $boleta->fechainicio=$request->fechainicio;
                $boleta->fechafin=$request->fechafin;
                $boleta->id_opcioneslista=$request->opcomisiones;
                $boleta->destino='0';
                $boleta->estado='2';
                $boleta->comentario='';
                $boleta->fecharespuesta=$request->fecha_solicitud;
                $boleta->horainicio=$request->horainicio;
                $boleta->horafin=$request->horafin;
                $boleta->save();
                return redirect()->route('gerente.index');

            }
            public function aceptarsolicitud(Request $request){

                $coneccion = mysqli_connect ("localhost", "root", "" );
                $basededatos = 'cotel';
                  $bd =mysqli_select_db ($coneccion, $basededatos);
                  $hoy = date("d-m-Y H:i:s"); 
                  $consultita=" SELECT nombres_usu,apellidos_usu from usuario where codigo_usu='$request->remitente2'";
                  $resultado2=mysqli_query($coneccion,$consultita);
                  while($rest2=mysqli_fetch_array($resultado2)){
                  
                    $nomr=$rest2['nombres_usu']." ".$rest2['apellidos_usu'];
                }
        
                  $id=$request->idsolicitud;
                 $resp=Solicitud::findOrFail($id) ;
                 $resp->id = $request->idsolicitud;
                 $resp->fecharespuesta = $request->fecharespuesta;
                 $comentariod=$request->comentario;
                 if($comentariod==""){
                     $comentariod="sin comentario";
                 }
        
                 $com1=$request->comentariodep;
                 $resp->comentario = strtoupper($com1." "."$comentariod"." por ".$nomr);
                 $remt=$request->remitente2;
                 $hr=$request->historialremit;
                          
        
                 $historial=" por gerente : ".$nomr;
        
        
                    if($request->boton=="aceptar"){
                        $resp->id_remitente='0';
                        $resp->destino = '0';
                        $resp->estado='2';
                        $resp->historial_remitentes=$hr." -- Aprobado ".$historial;
                        $resp->historial_fechas_gerente=" Aprobado ".$historial." en : ". $hoy;

                        
        
               }else{
                           $resp->estado='0';
                           $resp->destino='0';
                           $resp->historial_remitentes=$hr." -- Reprobado ".$historial;
                           $resp->historial_fechas_gerente=" Rechazado ".$historial." en : ". $hoy;

               }
               $resp->save();
               return redirect()->route('gerente.index');
                    
                 }
                 public function enviareva(Request $request)
                 {
                     $codigo= session('codigo_usu');
                     $coneccion = mysqli_connect ("localhost", "root", "" );
                     $basededatos = 'cotel';
                     $bd =mysqli_select_db ($coneccion, $basededatos);
                  
                     $consul="SELECT codigo_usu FROM usuario WHERE id='$request->departamento'";
                     $resultado2=mysqli_query($coneccion,$consul);
                     while($rest2=mysqli_fetch_array($resultado2)){
      
                       $evaluado=$rest2['codigo_usu'];
                     }
     
                     $eva = new Evaluacion;
                     $eva->Id_usu=$request->Id_usu;
                     $eva->Codigo_evaluado=$evaluado;
                     
                     $eva->Fecha_eva=$request->Fecha_eva;
                     $eva->Fortaleza_eva=$request->Fortaleza_eva;
                     $eva->Debilidad_eva=$request->Debilidad_eva;
                     $eva->save();
     
                     $foreva=$request->Fortaleza_eva;
     
     
                     $codigo1 = "select * from evaluacion where Fortaleza_eva='$foreva'";
                     $resultado1 = mysqli_query($coneccion, $codigo1);
                     while ($rest1 = mysqli_fetch_array($resultado1)) {
                         $ideva=$rest1['Id_eva'];
                     }
                     
     
                    foreach($request->pregunta as $selected){
     
                             $res = new Respuesta;
                             $res->Id_eva=$ideva;
                             $res->Id_conpr=$selected;
                             $res->save();
                         }
                         $codigo100 = "SELECT  r.Id_eva, ROUND(AVG(t.Valor_con),1) as Valor_evaluacion                        FROM respuestas as r,conpreres as c, tiporespuesta as t, preguntas as p
                       WHERE r.Id_eva=$ideva and r.Id_conpr= c.Id_conpr and c.Id_tiporesp=t.Id_tiporesp and c.Id_pre=p.Id_pre
                      ";
                       $resultado100 = mysqli_query($coneccion, $codigo100);
                       while ($rest100 = mysqli_fetch_array($resultado100)) {
                           $valoreva=$rest100['Valor_evaluacion'];
                       }
                       
                       Evaluacion::where('Id_eva', $ideva)
                       ->update(['Valor_evaluacion' => $valoreva]);
       
                     if($request->Descrip_nec1!="")
                     {
                        $nec = new Necesidad;
                        $nec->Id_eva=$ideva;
                        $nec->Descrip_nec=$request->Descrip_nec1;
                        $nec->Profun_nec=$request->necesidad;
                        $nec->save();
                            }
                     if($request->Descrip_nec2!="")
                     {
                        $nec = new Necesidad;
                        $nec->Id_eva=$ideva;
                        $nec->Descrip_nec=$request->Descrip_nec2;
                        $nec->Profun_nec=$request->necesidad2;
                        $nec->save();
                            }
                            if($request->Descrip_nec3!="")
                     {
                        $nec = new Necesidad;
                        $nec->Id_eva=$ideva;
                        $nec->Descrip_nec=$request->Descrip_nec3;
                        $nec->Profun_nec=$request->necesidad3;
                        $nec->save();
                            }
                            if($request->Descrip_nec4!="")
                     {
                        $nec = new Necesidad;
                        $nec->Id_eva=$ideva;
                        $nec->Descrip_nec=$request->Descrip_nec4;
                        $nec->Profun_nec=$request->necesidad4;
                        $nec->save();
                            }
                            if($request->Descrip_nec5!="")
                            {
                               $nec = new Necesidad;
                               $nec->Id_eva=$ideva;
                               $nec->Descrip_nec=$request->Descrip_nec5;
                               $nec->Profun_nec=$request->necesidad5;
                               $nec->save();
                                   }
                                $evalu=$request->departamento;
                       Usuario::where('id', $evalu)
                       ->update(['Estado_eva' => 1]);
     
                     
                     return redirect()->route('gerente.index');
     
     
                 }
    }
