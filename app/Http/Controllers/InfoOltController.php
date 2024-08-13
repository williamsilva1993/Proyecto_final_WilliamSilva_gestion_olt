<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta_olt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class InfoOltController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(string $id)
    {
        $user = Auth::user();
        $password = Crypt::decryptString($user->pasword); 
        $olt = DB::table('olt')
        ->where('idolt', '=', $id)
        ->get();
    $tarjetas = DB::table('tarjeta_olt as tarjetas')
        ->join('olt as olts', 'tarjetas.idolt', '=', 'olts.idolt')
        ->select('tarjetas.idtarjeta_olt', 'olts.idolt', 'tarjetas.nombre_tarjeta', 'tarjetas.numero_slot', 'tarjetas.cantidad_puerto', 'tarjetas.estado as estadotarjeta', 'olts.nombre')
        ->where('tarjetas.estado', '=', 'Activo')
        ->where('olts.idolt', '=', $id)
        ->get();
        return view('info-OLT.index', compact('olt','tarjetas','password'));
    }




    
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
