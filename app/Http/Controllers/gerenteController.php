<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;
class gerenteController extends Controller
{
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
                $boleta->fechainicio=$request->fechainicio;
                $boleta->fechafin=$request->fechafin;
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
    }
