<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\jefecontroller;
use App\Http\Controllers\gerenteController;
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\ContaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', HomeController::class,'index')->name('index');
Route::get('/registro', [HomeController::class, 'registro']);
Route::post('/registro', [HomeController::class, 'store'])->name('registro');


Route::get('/login', [HomeController::class, 'login']);
Route::get('/mon', [HomeController::class, 'mon']);


Route::get('/departamentos', [HomeController::class, 'getDepartamentos']);
Route::get('usuario/departamentos', [UsuarioController::class, 'getDepartamentos']);

Route::get('/departamentos', [AdminController::class, 'getDepartamentos']);


Route::get('layouts', [PlantillaController::class, 'index'])->name('layouts.index');
Route::get('layouts/plantilla', [PlantillaController::class, 'plantilla']);

    Route::post('layauts', [PlantillaController::class, 'store'])->name('layauts.store');
    //Route::get('layouts/mon', [PlantillaController::class, 'mon'])->name('layouts.index');

Route::post('usuario/usuarionombre', [UsuarioController::class, 'usuarionombre'])->name('usuario.usuarionombre');
Route::get('usuario', [UsuarioController::class, 'index'])->name('usuario.index');
Route::post('/loginme', [HomeController::class,'login'])->name('/loginme');
Route::post('/completaregistro', [HomeController::class,'completaregistro'])->name('/completaregistro');
Route::post('datos', [HomeController::class,'datos']);
Route::get('consultaregistro', [HomeController::class, 'consultaregistro']);
Route::get('finalizaregistro', [HomeController::class, 'finalizaregistro']);

Route::post('download', [UsuarioController::class,'download'])->name('usuario.download');
Route::post('imprimir1', [UsuarioController::class,'imprimir1'])->name('usuario.imprimir1');

Route::get('usuario/create', [UsuarioController::class, 'create']);
    Route::get('usuario/ver', [UsuarioController::class, 'ver']);
    Route::get('usuario/formulario', [UsuarioController::class, 'formulario']);
    Route::get('usuario/permiso', [UsuarioController::class, 'permiso']);
    Route::post('usuario/permiso', [UsuarioController::class, 'solpermiso'])->name('usuario.solpermiso');
    Route::get('usuario/vacaciones', [UsuarioController::class, 'vacaciones']);
    Route::post('usuario/vacaciones', [UsuarioController::class, 'solvacaciones'])->name('usuario.solvacaciones');
    Route::get('usuario/comisiones', [UsuarioController::class, 'comisiones']);
    Route::post('usuario/comisiones', [UsuarioController::class, 'solcomisiones'])->name('usuario.solcomisiones');
    Route::get('usuario/boleta', [UsuarioController::class, 'boleta']);
    Route::post('usuario/boleta', [UsuarioController::class, 'solboleta'])->name('usuario.solboleta');
    Route::get('usuario/trabajo', [UsuarioController::class, 'trabajo']);
    Route::post('usuario/trabajo', [UsuarioController::class, 'soltrabajo'])->name('usuario.soltrabajo');
    Route::get('usuario/medico', [UsuarioController::class, 'medico']);
    Route::post('usuario/medico', [UsuarioController::class, 'solmedico'])->name('usuario.solmedico');
    Route::get('usuario/aceptadas', [UsuarioController::class, 'aceptadas']);
    Route::get('usuario/rechazadas', [UsuarioController::class, 'rechazadas']);
    Route::get('usuario/pendientes', [UsuarioController::class, 'pendientes']);
    Route::get('usuario/lista', [UsuarioController::class, 'listas']);
    Route::get('usuario/info', [UsuarioController::class, 'info'])->name('usuario.info');
    Route::get('usuario/imprimir', [UsuarioController::class, 'imprimir'])->name('usuario.imprimir');
    Route::get('usuario/plantillaimpresion', [UsuarioController::class, 'plantillaimpresion'])->name('usuario.plantillaimpresion');
    Route::get('usuario/poraprobar', [UsuarioController::class, 'poraprobar']);
    Route::get('usuario/formaceptar2', [UsuarioController::class, 'formaceptar2']);
    Route::POST('usuario/aceptarsolicitud', [Usuariocontroller::class, 'aceptarsolicitud']);
    Route::get('usuario/calendario', [UsuarioController::class, 'calendario']);

    Route::get('usuario/miscertificados', [UsuarioController::class, 'miscertificados']);

    Route::post('pdfcertificado', [UsuarioController::class,'pdfcertificado'])->name('usuario.pdfcertificado');

    Route::get('usuario/certificadopdfuno', [UsuarioController::class, 'certificadopdfuno'])->name('usuario.certificadopdfuno');
    Route::POST('usuario/micertificadoT', [UsuarioController::class, 'micertificadoT'])->name('usuario.micertificadoT');
    Route::get('usuario/pdfmicertificad', [UsuarioController::class, 'pdfmicertificad'])->name('usuario.pdfmicertificad');
    
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');


    Route::get('admin/formulario', [AdminController::class, 'formulario']);
    Route::get('admin/boleta', [AdminController::class, 'boleta']);
    Route::get('admin/trabajo', [AdminController::class, 'trabajo']);
    Route::get('admin/medico', [AdminController::class, 'medico']);
    Route::get('admin/reportes', [AdminController::class, 'reportes']);
    Route::get('admin/repo', [AdminController::class, 'repo']);
    Route::get('admin/maps', [AdminController::class, 'maps']);
    
Route::get('admin/evaluaciones', [AdminController::class,'evaluaciones'])->name('evaluaciones');

    /////
    Route::get('admin/formapro', [AdminController::class, 'formapro']);
    Route::get('admin/formrepro', [AdminController::class, 'formrepro']);
    Route::get('admin/formpend', [AdminController::class, 'formpend']);
    Route::get('admin/trabapro', [AdminController::class, 'trabapro']);
    Route::get('admin/trabrepro', [AdminController::class, 'trabrepro']);
    Route::get('admin/bolapro', [AdminController::class, 'bolapro']);
    Route::get('admin/bolrepro', [AdminController::class, 'bolrepro']);
    Route::get('admin/medapro', [AdminController::class, 'medapro']);
    Route::get('admin/medrepro', [AdminController::class, 'medrepro']);
    Route::get('admin/reporte', [AdminController::class, 'reporte']);
    Route::get('admin/formaceptar', [AdminController::class, 'formaceptar']);
    Route::get('admin/bolaceptar', [AdminController::class, 'bolaceptar']);
    Route::get('admin/medaceptar', [AdminController::class, 'medaceptar']);
    Route::POST('admin/aceptarsolicitud', [AdminController::class, 'aceptarsolicitud']);
    Route::get('admin/formmodificar', [AdminController::class, 'formmodificar']);
    Route::get('admin/listas', [AdminController::class, 'listas2']);
    Route::get('admin/anticipacion', [AdminController::class, 'anticipacion'])->name('admin.anticipacion');
    Route::get('admin/editaranticipacion', [AdminController::class, 'editaranticipacion'])->name('editaranticipacion');
    Route::POST('admin/fineditaranticipacion', [AdminController::class, 'fineditaranticipacion']);
    Route::get('admin/feriadonuevo', [AdminController::class, 'feriadonuevo'])->name('feriadonuevo');
    Route::POST('admin/nuevoferiadoform', [AdminController::class, 'nuevoferiadoform'])->name('nuevoferiadoform');
Route::POST('admin/modificarusuario', [AdminController::class, 'modificarusuario']);
Route::get('admin/feriados', [AdminController::class, 'feriados'])->name('admin.feriados');
Route::get('admin/detalleferiado', [AdminController::class, 'detalleferiado']);
Route::POST('admin/fineditarferiado', [AdminController::class, 'fineditarferiado'])->name('fineditarferiado');
Route::get('admin/usuarios', [AdminController::class, 'listausuarios']);
Route::get('admin/info', [AdminController::class, 'info'])->name('admin.info');
Route::get('admin/agre', [AdminController::class, 'agre'])->name('admin.agre');
Route::get('admin/lista', [AdminController::class, 'lista']);
Route::post('admin/regis', [AdminController::class, 'regis'])->name('admin.regis');
Route::get('admin/formal', [AdminController::class, 'formal']);
Route::get('admin/crearcertificado', [AdminController::class, 'crearcertificado'])->name('admin.crearcertificado');
    Route::get('admin/trabajoaceptar', [AdminController::class, 'trabajoaceptar'])->name('admin.trabajoaceptar');
    Route::POST('admin/certificadopasouno', [AdminController::class, 'certificadopasouno'])->name('admin.certificadopasouno');
    Route::POST('admin/certificadopasodos', [AdminController::class, 'certificadopasodos'])->name('admin.certificadopasodos');
     Route::get('admin/formatocertificado', [AdminController::class, 'formatocertificado'])->name('admin.formatocertificado');
    Route::get('admin/contabilidad', [AdminController::class, 'contabilidad'])->name('admin.contabilidad');
    Route::POST('admin/enviarcertificado', [AdminController::class, 'enviarcertificado']);
    Route::POST('admin/enviarcontabilidad', [AdminController::class, 'enviarcontabilidad']);
    Route::get('admin/nuevotiporesp', [AdminController::class, 'nuevotiporesp'])->name('admin.nuevotiporesp');
    Route::POST('admin/crearnuevotipores', [AdminController::class, 'crearnuevotipores'])->name('crearnuevotipores');
    
    Route::get('admin/trabajo', [AdminController::class, 'trabajo'])->name('admin.trabajo');



    Route::get('gerente', [gerenteController::class, 'index'])->name('gerente.index');
        Route::get('gerente/boleta', [gerenteController::class, 'boleta']);
        Route::get('gerente/comisiones', [gerenteController::class, 'comisiones']);
        Route::get('gerente/formulario', [gerenteController::class, 'formulario']);
        Route::get('gerente/medico', [gerenteController::class, 'medico']);
        Route::get('gerente/permiso', [gerenteController::class, 'permiso']);
        Route::get('gerente/trabajo', [gerenteController::class, 'trabajo']);
        Route::get('gerente/vacaciones', [gerenteController::class, 'vacaciones']);
        Route::get('gerente/ver', [gerenteController::class, 'ver']);
        Route::get('gerente/aceptadas', [gerenteController::class, 'aceptadas']);
        Route::get('gerente/rechazadas', [gerenteController::class, 'rechazadas']);
        Route::get('gerente/pendientes', [gerenteController::class, 'pendientes']);
        Route::get('gerente/poraprobar', [gerenteController::class, 'poraprobar']);
        Route::get('gerente/formaceptar', [gerenteController::class, 'formaceptar']);
        Route::POST('gerente/aceptarsolicitud', [gerenteController::class, 'aceptarsolicitud']);
        Route::post('gerente/permiso', [gerenteController::class, 'solpermiso'])->name('gerente.solpermiso');
        Route::post('gerente/vacaciones', [gerenteController::class, 'solvacaciones'])->name('gerente.solvacaciones');
        Route::post('gerente/comisiones', [gerenteController::class, 'solcomisiones'])->name('gerente.solcomisiones');
        Route::post('gerente/boleta', [gerenteController::class, 'solboleta'])->name('gerente.solboleta');
        Route::post('gerente/trabajo', [gerenteController::class, 'soltrabajo'])->name('gerente.soltrabajo');
        Route::post('gerente/medico', [gerenteController::class, 'solmedico'])->name('gerente.solmedico');
        Route::get('conta', [ContaController::class, 'index']);
    Route::get('conta', [ContaController::class, 'index'])->name('conta.index')->name('conta.respondidas');
    Route::get('conta/respondidas', [ContaController::class, 'respondidas']);
    Route::get('conta/pendientes', [ContaController::class, 'pendientes']);
    Route::get('conta/formaceptar', [ContaController::class, 'formaceptar']);
    Route::POST('conta/aceptarsolicitud', [Contacontroller::class, 'aceptarsolicitud'])->name('conta.aceptarsolicitud');