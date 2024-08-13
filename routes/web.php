<?php

use App\Http\Controllers\InfoOltController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OltController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\Puerto_oltController;
use App\Http\Controllers\Tarjeta_oltController;
use App\Http\Controllers\ConexionController;
use App\Http\Controllers\GraficosOltController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('/principal', PrincipalController::class);
Route::resource('/olt', OltController::class);
Route::resource('/seguridad', UsuarioController::class);
Route::resource('/graficos', GraficosOltController::class);
Route::get('/tarjeta/{id}', [Tarjeta_oltController::class, 'create'])->name('tarjeta.create');
Route::post('/guardar-tarjeta', [Tarjeta_oltController::class, 'store'])->name('guardar-tarjeta.store');
Route::get('/edit-tarjeta/{id}', [Tarjeta_oltController::class, 'edit'])->name('edit-tarjeta.edit');
Route::post('/editar-tarjeta/{id}', [Tarjeta_oltController::class, 'update'])->name('editar-tarjeta.update');
Route::delete('/delete-tarjeta/{id}', [Tarjeta_oltController::class, 'destroy'])->name('delete-tarjeta.destroy');

Route::get('puerto/{id}',[Puerto_oltController::class,'create'])->name('puerto.create');
Route::post('/guardar-puerto', [Puerto_oltController::class, 'store'])->name('guardar-puerto.store');
Route::get('/edit-puerto/{id}', [Puerto_oltController::class, 'edit'])->name('edit-puerto.edit');
Route::post('/editar-puerto/{id}', [Puerto_oltController::class, 'update'])->name('editar-puerto.update');
Route::delete('/delete-puerto/{id}', [Puerto_oltController::class, 'destroy'])->name('delete-puerto.destroy');

Route::get('info-olt/{id}',[InfoOltController::class,'index'])->name('info-olt.index');


Route::post('info_mcud', [ConexionController::class, 'info_mcud']);
Route::post('tiempo_activo', [ConexionController::class, 'tiempo_activo']);
Route::post('busqueda_sn', [ConexionController::class, 'busqueda_sn']);
Route::post('resultado_busqueda_sn', [ConexionController::class, 'resultado_busqueda_sn']);
Route::post('resultado_busqueda_sn_clientes', [ConexionController::class, 'resultado_busqueda_sn_clientes']);
Route::post('trafico_olt', [ConexionController::class, 'trafico_olt']);
Route::post('revisar_log', [ConexionController::class, 'revisar_log']);
Route::get('estado_tarjeta/{slot}', [ConexionController::class, 'estado_tarjeta'])->name('estado_tarjeta.estado_tarjeta');
Route::get('probar_conexion_ssh/{olt_ssh}', [ConexionController::class, 'probar_conexion_ssh'])->name('probar_conexion_ssh.probar_conexion_ssh');
Route::get('reiniciar_olt/{olt_reiniciar}', [ConexionController::class, 'reiniciar_olt'])->name('reiniciar_olt.reiniciar_olt');
Route::get('clientes_puerto/{tarjeta}/{puerto_tarj}', [ConexionController::class, 'clientes_puerto'])->name('clientes_puerto.clientes_puerto');
Route::get('detalle_onu_cliente/{tarjeta}/{puerto_tarj}/{onu_id}/{descripcion}/{serial}', [ConexionController::class, 'detalle_onu_cliente'])->name('detalle_onu_cliente.detalle_onu_cliente');
Route::get('optical_cliente/{tarjeta}/{puerto_tarj}/{onu_id}/{descripcion}/{serial}', [ConexionController::class, 'optical_cliente'])->name('optical_cliente.optical_cliente');
Route::get('onu_instalada/{tarjeta}/{puerto_tarj}/{onu_id}/{descripcion}/{serial}', [ConexionController::class, 'onu_instalada'])->name('onu_instalada.onu_instalada');
Route::get('onu_service_port/{tarjeta}/{puerto_tarj}/{onu_id}/{descripcion}/{serial}', [ConexionController::class, 'onu_service_port'])->name('onu_service_port.onu_service_port');
Route::get('detalle_onu_cliente2/{olt_id}/{ipconexion}/{puerto_olt}/{tarjeta}/{puerto_tarj}/{onu_id}/{descripcion}/{serial}', [ConexionController::class, 'detalle_onu_cliente2'])->name('detalle_onu_cliente2.detalle_onu_cliente2');
Route::get('optical_cliente2/{olt_id}/{ipconexion}/{puerto_olt}/{tarjeta}/{puerto_tarj}/{onu_id}/{descripcion}/{serial}', [ConexionController::class, 'optical_cliente2'])->name('optical_cliente2.optical_cliente2');
Route::get('onu_instalada2/{olt_id}/{ipconexion}/{puerto_olt}/{tarjeta}/{puerto_tarj}/{onu_id}/{descripcion}/{serial}', [ConexionController::class, 'onu_instalada2'])->name('onu_instalada2.onu_instalada2');
Route::get('onu_service_port2/{olt_id}/{ipconexion}/{puerto_olt}/{tarjeta}/{puerto_tarj}/{onu_id}/{descripcion}/{serial}', [ConexionController::class, 'onu_service_port2'])->name('onu_service_port2.onu_service_port2');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
