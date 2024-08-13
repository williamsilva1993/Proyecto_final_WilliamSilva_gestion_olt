<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use function Laravel\Prompts\table;

class ConexionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function info_mcud(Request $request)
    {
        $user = Auth::user();
        $password = Crypt::decryptString($user->pasword); 
        
        // Escapar las variables para evitar inyección de comandos
    $id=$request->input('id'); 
    $d = $request->input('d');
    $od = $request->input('od');
    $ed = $request->input('ed');
    $ad = $request->input('ad');
    $olt = DB::table('olt')
    ->where('idolt', '=', $id)
    ->get();
        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/info_mcud.py $d $od $ed $ad";
    
        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);
    
    
        return view('info-OLT-Python.info_mcud', ["resultado" => $resultado,"olt"=>$olt,"password"=>$password]);
    }
/*
    public function tiempo_activo(Request $request)
    {
        // Escapar las variables para evitar inyección de comandos
    $id=$request->input('id'); 
    $d = $request->input('d');
    $od = $request->input('od');
    $ed = $request->input('ed');
    $ad = $request->input('ad');
    $olt = DB::table('olt')
    ->where('idolt', '=', $id)
    ->get();
        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/tiempo_activo.py $d $od $ed $ad";
    
        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);
    
    
        return view('info-OLT-Python.tiempo_activo', ["resultado" => $resultado,"olt"=>$olt]);
    }
    */

    public function tiempo_activo(Request $request)
    {
      // Escapar las variables para evitar inyección de comandos
      $user = Auth::user();
      $password = Crypt::decryptString($user->pasword);
      $id=$request->input('id'); 
      $d = $request->input('d');
      $od = $request->input('od');
      $ed = $request->input('ed');
      $ad = $request->input('ad');
      $olt = DB::table('olt')
      ->where('idolt', '=', $id)
      ->get();
        
    
    
        return view('info-OLT-Python.tiempo_activo', compact('olt','password'));
    }
    public function trafico_olt(Request $request)
    {
        $user = Auth::user();
        $password = Crypt::decryptString($user->pasword);
        // Escapar las variables para evitar inyección de comandos
    $id=$request->input('id'); 
    $d = $request->input('d');
    $od = $request->input('od');
    $ed = $request->input('ed');
    $ad = $request->input('ad');
    $olt = DB::table('olt')
    ->where('idolt', '=', $id)
    ->get();

    
    
        return view('info-OLT-Python.trafico_olt', compact('olt','password'));
    }
    public function busqueda_sn(Request $request)
    {
 
$user = Auth::user();
        
$password = Crypt::decryptString($user->pasword); 
        // Escapar las variables para evitar inyección de comandos
    $id=$request->input('id'); 
    $d = $request->input('d');
    $od = $request->input('od');
    $ed = $request->input('ed');
    $ad = $request->input('ad');
    $olt = DB::table('olt')
    ->where('idolt', '=', $id)
    ->get();

        return view('info-OLT-Python.busqueda_sn', compact('id','d','od','ed','ad','olt','password'));
    }
    public function resultado_busqueda_sn(Request $request)
{
    $user = Auth::user();
    $password = Crypt::decryptString($user->pasword);
    // Escapar las variables para evitar inyección de comandos
    $id = $request->input('id');
    $d = $request->input('d');
    $od = $request->input('od');
    $ed = $request->input('ed');
    $ad = $request->input('ad');
    $sn = $request->input('sn');
    $olt = DB::table('olt')
        ->where('idolt', '=', $id)
        ->get();

    // Comando para ejecutar el script Python con las variables
    $comando = "C:\\Users\\Willi-PC\\AppData\\Local\\Programs\\Python\\Python312\\python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/resultado_busqueda_sn.py $d $od $ed $ad $sn";

    // Ejecutar el comando y obtener la salida
    $resultado = shell_exec($comando);

    // Convertir el resultado a JSON
    $datosOnt = json_decode($resultado, true);

    // Validar si la conversión de JSON fue exitosa
    if (json_last_error() !== JSON_ERROR_NONE) {
        $datosOnt = ['error' => 'Error al decodificar la respuesta del script Python.'];
    }

    // Pasar variables separadas a la vista
    $slot = $datosOnt['slot'] ?? null;
    $tarjeta = $datosOnt['tarjeta'] ?? null;
    $puerto = $datosOnt['puerto'] ?? null;
    $ontId = $datosOnt['ONT-ID'] ?? null;
    $runState = $datosOnt['Run state'] ?? null;
    //$memory = $datosOnt['Memory'] ?? null;
    //$cpu = $datosOnt['CPU'] ?? null;
   // $temperature = $datosOnt['Temperature'] ?? null;
    $description = $datosOnt['Description'] ?? null;
    //$lastDownCause = $datosOnt['last down cause'] ?? null;
    //$lastUpTime = $datosOnt['last up time'] ?? null;
    //$lastDownTime = $datosOnt['last down time'] ?? null;
    //$lastDyingGaspTime = $datosOnt['last dying gasp time'] ?? null;

    return view('info-OLT-Python.resultado_busqueda_sn', compact(
        'olt',
        'sn',
        'tarjeta',
        'slot',
        'puerto',
        'ontId',
        'runState',
        'description',
        'datosOnt',
        'password'
    ));
}

    public function revisar_log(Request $request)
    {
        $user = Auth::user();
        $password = Crypt::decryptString($user->pasword);
         // Escapar las variables para evitar inyección de comandos
    $id=$request->input('id'); 
    $d = $request->input('d');
    $od = $request->input('od');
    $ed = $request->input('ed');
    $ad = $request->input('ad');
    $olt = DB::table('olt')
    ->where('idolt', '=', $id)
    ->get();
        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/revisar_log.py $d $od $ed $ad";
    
        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);
    
    
        return view('info-OLT-Python.revisar_log', ["resultado" => $resultado,"olt"=>$olt,"password"=>$password]);
    }


    public function estado_tarjeta(Request $request, string $slot)
    {
        $user = Auth::user();
    
    // Obtén el nombre del usuario
        $tarjetas = DB::table('tarjeta_olt as tarjetas')
            ->join('olt as olts', 'tarjetas.idolt', '=', 'olts.idolt')
            ->select('tarjetas.idtarjeta_olt', 'olts.idolt', 'tarjetas.nombre_tarjeta', 'tarjetas.numero_slot', 'tarjetas.cantidad_puerto', 'tarjetas.estado as estadotarjeta', 'olts.nombre as nombreolt','olts.ipconexion as ipconexion','olts.puerto as puerto')
            ->where('tarjetas.estado', '=', 'Activo')
            ->where('tarjetas.idtarjeta_olt', '=', $slot)
            ->first();
              // Escapar las variables para evitar inyección de comandos
        $d = $tarjetas->ipconexion;
        $od = $tarjetas->puerto;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);
        $slotud=$tarjetas->numero_slot;
        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/estado_tarjeta.py $d $od $ed $ad $slotud";

        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);  

        // Decodificar el JSON
        $datos = json_decode($resultado);
        $onlineCount = 0;
        $offlineCount = 0;
        $total=0;
        foreach ($datos as $dato) {
            if ($dato->status == "Online") {
                $onlineCount++;
            } elseif($dato->status == "Offline") {
                $offlineCount++;
            }
        }

        $total=$onlineCount+$offlineCount;

        return view('info-OLT-Python.estado_tarjeta', compact('tarjetas','datos','slotud','onlineCount','offlineCount','total'));
    }

    public function probar_conexion_ssh(Request $request, string $olt_ssh)
    {
        $user = Auth::user();
        $olt = DB::table('olt')
        ->select('idolt', 'nombre', 'ipconexion', 'puerto')
        ->where('idolt', '=', $olt_ssh)
        ->first(); // Usar first() para obtener el primer resultado como un objeto, no una colección

    // Verificar si se encontró un resultado
    if (!$olt) {
        // Manejar el caso donde no se encontró el OLT
        return response()->json(['error' => 'No se encontró la OLT especificada'], 404);
    }
              // Escapar las variables para evitar inyección de comandos
        $d = $olt->ipconexion;
        $od = $olt->puerto;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);
   
        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt2/scriptpython/probar_conexion_ssh.py $d $od $ed $ad ";

        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);  


        return view('info-OLT-Python.prueba_conexion_ssh', compact('olt','resultado'));
    }

    public function reiniciar_olt(Request $request, string $olt_reiniciar)
    {
        $user = Auth::user();
        $olt = DB::table('olt')
            ->select('idolt', 'nombre', 'ipconexion', 'puerto')
            ->where('idolt', '=', $olt_reiniciar)
            ->first(); // Usar first() para obtener el primer resultado como un objeto, no una colección
    
        // Verificar si se encontró un resultado
        if (!$olt) {
            return response()->json(['error' => 'No se encontró la OLT especificada'], 404);
        }
    
        // Escapar las variables para evitar inyección de comandos
        $d = $olt->ipconexion;
        $od = $olt->puerto;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);
    
        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312\python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/reiniciar_olt.py $d $od $ed $ad";
    
        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);
    
        return view('info-OLT-Python.reiniciar_olt', compact('olt', 'resultado'));
    }



    public function clientes_puerto(Request $request, string $tarjeta, string $puerto_tarj)
    {
        $user = Auth::user();
        $tarjetas = DB::table('tarjeta_olt as tarjetas')
            ->join('olt as olts', 'tarjetas.idolt', '=', 'olts.idolt')
            ->select('tarjetas.idtarjeta_olt', 'olts.idolt', 'tarjetas.nombre_tarjeta', 'tarjetas.numero_slot', 'tarjetas.cantidad_puerto', 'tarjetas.estado as estadotarjeta', 'olts.nombre as nombreolt','olts.ipconexion as ipconexion','olts.puerto as puerto')
            ->where('tarjetas.estado', '=', 'Activo')
            ->where('tarjetas.idtarjeta_olt', '=', $tarjeta)
            ->first();
              // Escapar las variables para evitar inyección de comandos
        $d = $tarjetas->ipconexion;
        $od = $tarjetas->puerto;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);
        $tarjeta=$tarjetas->numero_slot;

        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/clientes_puerto.py $d $od $ed $ad $tarjeta $puerto_tarj";
        $comando2 = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/clientes_puerto_nombre.py $d $od $ed $ad $tarjeta $puerto_tarj";
        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);
        $resultado2 = shell_exec($comando2);    

        // Decodificar el JSON
        $datos = json_decode($resultado);
        $datos2 = json_decode($resultado2);
        $onlineCount = 0;
        $offlineCount = 0;
        $total=0;
        foreach ($datos as $dato) {
            if ($dato->estado == "online") {
                $onlineCount++;
            } elseif($dato->estado == "offline") {
                $offlineCount++;
            }
        }
        $total=$onlineCount+ $offlineCount;


        return view('info-OLT-Python.clientes_puerto', compact('tarjetas','datos','datos2','tarjeta','puerto_tarj','onlineCount','offlineCount','total'));
    }

    public function detalle_onu_cliente(Request $request, string $tarjeta, string $puerto_tarj, string $onu_id, string $descripcion, string $serial)
    {
        $user = Auth::user();
        $tarjetas = DB::table('tarjeta_olt as tarjetas')
            ->join('olt as olts', 'tarjetas.idolt', '=', 'olts.idolt')
            ->select('tarjetas.idtarjeta_olt', 'olts.idolt', 'tarjetas.nombre_tarjeta', 'tarjetas.numero_slot', 'tarjetas.cantidad_puerto', 'tarjetas.estado as estadotarjeta', 'olts.nombre as nombreolt','olts.ipconexion as ipconexion','olts.puerto as puerto')
            ->where('tarjetas.estado', '=', 'Activo')
            ->where('tarjetas.idtarjeta_olt', '=', $tarjeta)
            ->first();
              // Escapar las variables para evitar inyección de comandos
        $d = $tarjetas->ipconexion;
        $od = $tarjetas->puerto;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);
        $tarjeta=$tarjetas->numero_slot;

        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/detalle_onu_cliente.py $d $od $ed $ad $tarjeta $puerto_tarj $onu_id";

        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);  


        return view('info-OLT-Python.detalle_onu_cliente', compact('tarjetas','resultado','tarjeta','puerto_tarj','onu_id','descripcion','serial'));
    }
 
    public function optical_cliente(Request $request, string $tarjeta, string $puerto_tarj, string $onu_id, string $descripcion, string $serial)
    {
        $user = Auth::user();
        $tarjetas = DB::table('tarjeta_olt as tarjetas')
            ->join('olt as olts', 'tarjetas.idolt', '=', 'olts.idolt')
            ->select('tarjetas.idtarjeta_olt', 'olts.idolt', 'tarjetas.nombre_tarjeta', 'tarjetas.numero_slot', 'tarjetas.cantidad_puerto', 'tarjetas.estado as estadotarjeta', 'olts.nombre as nombreolt','olts.ipconexion as ipconexion','olts.puerto as puerto')
            ->where('tarjetas.estado', '=', 'Activo')
            ->where('tarjetas.idtarjeta_olt', '=', $tarjeta)
            ->first();
              // Escapar las variables para evitar inyección de comandos
        $d = $tarjetas->ipconexion;
        $od = $tarjetas->puerto;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);
        $tarjeta=$tarjetas->numero_slot;

        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/optical_cliente.py $d $od $ed $ad $tarjeta $puerto_tarj $onu_id";

        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);  


        return view('info-OLT-Python.detalle_onu_cliente', compact('tarjetas','resultado','tarjeta','puerto_tarj','onu_id','descripcion','serial'));
    }
    public function onu_instalada(Request $request, string $tarjeta, string $puerto_tarj, string $onu_id, string $descripcion, string $serial)
    {
        $user = Auth::user();
        $tarjetas = DB::table('tarjeta_olt as tarjetas')
            ->join('olt as olts', 'tarjetas.idolt', '=', 'olts.idolt')
            ->select('tarjetas.idtarjeta_olt', 'olts.idolt', 'tarjetas.nombre_tarjeta', 'tarjetas.numero_slot', 'tarjetas.cantidad_puerto', 'tarjetas.estado as estadotarjeta', 'olts.nombre as nombreolt','olts.ipconexion as ipconexion','olts.puerto as puerto')
            ->where('tarjetas.estado', '=', 'Activo')
            ->where('tarjetas.idtarjeta_olt', '=', $tarjeta)
            ->first();
              // Escapar las variables para evitar inyección de comandos
        $d = $tarjetas->ipconexion;
        $od = $tarjetas->puerto;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);
        $tarjeta=$tarjetas->numero_slot;

        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/onu_instalada.py $d $od $ed $ad $tarjeta $puerto_tarj $onu_id";

        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);  


        return view('info-OLT-Python.detalle_onu_cliente', compact('tarjetas','resultado','tarjeta','puerto_tarj','onu_id','descripcion','serial'));
    }
    public function onu_service_port(Request $request, string $tarjeta, string $puerto_tarj, string $onu_id, string $descripcion, string $serial)
    {
        $user = Auth::user();
        $tarjetas = DB::table('tarjeta_olt as tarjetas')
            ->join('olt as olts', 'tarjetas.idolt', '=', 'olts.idolt')
            ->select('tarjetas.idtarjeta_olt', 'olts.idolt', 'tarjetas.nombre_tarjeta', 'tarjetas.numero_slot', 'tarjetas.cantidad_puerto', 'tarjetas.estado as estadotarjeta', 'olts.nombre as nombreolt','olts.ipconexion as ipconexion','olts.puerto as puerto')
            ->where('tarjetas.estado', '=', 'Activo')
            ->where('tarjetas.idtarjeta_olt', '=', $tarjeta)
            ->first();
              // Escapar las variables para evitar inyección de comandos
        $d = $tarjetas->ipconexion;
        $od = $tarjetas->puerto;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);
        $tarjeta=$tarjetas->numero_slot;

        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/onu_service_port.py $d $od $ed $ad $tarjeta $puerto_tarj $onu_id";

        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);  


        return view('info-OLT-Python.detalle_onu_cliente', compact('tarjetas','resultado','tarjeta','puerto_tarj','onu_id','descripcion','serial'));
    }
    public function resultado_busqueda_sn_clientes(Request $request)
    {
        $user = Auth::user();
        
$password = Crypt::decryptString($user->pasword); 
  // Escapar las variables para evitar inyección de comandos
  $id=$request->input('id'); 
  $d = $request->input('d');
  $od = $request->input('od');
  $ed = $request->input('ed');
  $ad = $request->input('ad');
  $sn = $request->input('sn');
  $slot=$request->input('slot');
  $tarjeta=$request->input('tarjeta');
  $puerto=$request->input('puerto');
  $olt = DB::table('olt')
    ->where('idolt', '=', $id)
    ->get();
    // Comando para ejecutar el script Python con las variables
$comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/clientes_puerto.py $d $od $ed $ad $tarjeta $puerto";
$comando2 = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/clientes_puerto_nombre.py $d $od $ed $ad $tarjeta $puerto";
// Ejecutar el comando y obtener la salida
$resultado = shell_exec($comando);
$resultado2 = shell_exec($comando2);    

// Decodificar el JSON
$datos = json_decode($resultado);
$datos2 = json_decode($resultado2);
$onlineCount = 0;
$offlineCount = 0;
$total=0;
foreach ($datos as $dato) {
if ($dato->estado == "online") {
    $onlineCount++;
} elseif($dato->estado == "offline") {
    $offlineCount++;
}
}
$total=$onlineCount+ $offlineCount;


return view('info-OLT-Python.resultado_busqueda_sn_clientes', compact('olt','datos','datos2','tarjeta','puerto','slot','onlineCount','offlineCount','total','password'));

    }

    public function onu_instalada2(Request $request, string $olt_id, string $ipconexion, string $puerto_olt, string $tarjeta, string $puerto_tarj, string $onu_id, string $descripcion, string $serial)
    {
        $user = Auth::user();
              // Escapar las variables para evitar inyección de comandos
        $d = $ipconexion;
        $od = $puerto_olt;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);

        $olt = DB::table('olt')
        ->where('idolt', '=', $olt_id)
        ->get();
        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/onu_instalada.py $d $od $ed $ad $tarjeta $puerto_tarj $onu_id";

        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);  


        return view('info-OLT-Python.detalle_onu_cliente', compact('resultado','tarjeta','puerto_tarj','onu_id','descripcion','serial'));
    }


    public function detalle_onu_cliente2(Request $request, string $olt_id, string $ipconexion, string $puerto_olt, string $tarjeta, string $puerto_tarj, string $onu_id, string $descripcion, string $serial)
    {
        $user = Auth::user();
              // Escapar las variables para evitar inyección de comandos
        $d = $ipconexion;
        $od = $puerto_olt;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);

        $olt = DB::table('olt')
        ->where('idolt', '=', $olt_id)
        ->get();
        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/detalle_onu_cliente.py $d $od $ed $ad $tarjeta $puerto_tarj $onu_id";

        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);  


        return view('info-OLT-Python.detalle_onu_cliente', compact('resultado','tarjeta','puerto_tarj','onu_id','descripcion','serial'));
    }

    public function optical_cliente2(Request $request, string $olt_id, string $ipconexion, string $puerto_olt, string $tarjeta, string $puerto_tarj, string $onu_id, string $descripcion, string $serial)
    {
        $user = Auth::user();
              // Escapar las variables para evitar inyección de comandos
        $d = $ipconexion;
        $od = $puerto_olt;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);

        $olt = DB::table('olt')
        ->where('idolt', '=', $olt_id)
        ->get();
        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/optical_cliente.py $d $od $ed $ad $tarjeta $puerto_tarj $onu_id";

        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);  


        return view('info-OLT-Python.detalle_onu_cliente', compact('resultado','tarjeta','puerto_tarj','onu_id','descripcion','serial'));
    }
    
    public function onu_service_port2(Request $request, string $olt_id, string $ipconexion, string $puerto_olt, string $tarjeta, string $puerto_tarj, string $onu_id, string $descripcion, string $serial)
    {
        $user = Auth::user();
        
              // Escapar las variables para evitar inyección de comandos
        $d = $ipconexion;
        $od = $puerto_olt;
        $ed = $user->name;;
        $ad = Crypt::decryptString($user->pasword);

        $olt = DB::table('olt')
        ->where('idolt', '=', $olt_id)
        ->get();
        

        // Comando para ejecutar el script Python con las variables
        $comando = "C:\Users\Willi-PC\AppData\Local\Programs\Python\Python312/python.exe c:/xampp/htdocs/tesis_gestion_olt/scriptpython/onu_service_port.py $d $od $ed $ad $tarjeta $puerto_tarj $onu_id";

        // Ejecutar el comando y obtener la salida
        $resultado = shell_exec($comando);  


        return view('info-OLT-Python.detalle_onu_cliente', compact('resultado','tarjeta','puerto_tarj','onu_id','descripcion','serial'));
    }
    


}

