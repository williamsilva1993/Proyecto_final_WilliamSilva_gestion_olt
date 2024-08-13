<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puerto_olt;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class Puerto_oltController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
   
    public function index()
    {
        //
    }

    public function create(string $id)
    {
        $tarjetas = DB::table('tarjeta_olt as tarjetas')
        ->join('olt as olts','tarjetas.idolt','=','olts.idolt')
        ->select('tarjetas.idtarjeta_olt', 'olts.idolt', 'olts.nombre','tarjetas.nombre_tarjeta')
        ->where('idtarjeta_olt', '=', $id)
        ->get();
        $puertos=DB::table('puerto_olt as puertos')
        ->join('tarjeta_olt as tarjetas','puertos.idtarjeta_olt','=','tarjetas.idtarjeta_olt')
        ->select('puertos.idpuerto_olt', 'tarjetas.idtarjeta_olt','tarjetas.nombre_tarjeta', 'puertos.nombre_puerto', 'puertos.numero_puerto', 'puertos.vlan')
        ->where('puertos.idtarjeta_olt','=',$id)
        ->get();
        return view('puerto.create', compact('tarjetas','puertos'));
    }

    public function store(Request $request)
    {
        $puerto=new Puerto_olt();
        $puerto->idtarjeta_olt=$request->input('idtarjeta_olt');
        $puerto->nombre_puerto=$request->input('nombre_puerto');
        $puerto->numero_puerto=$request->input('numero_puerto');
        $puerto->vlan=$request->input('vlan');
        $puerto->save();
        return back()->with('success', 'Registro ingresado correctamente.');
        
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $tarjetas = DB::table('tarjeta_olt')
        ->where('idtarjeta_olt', '=', $id)
        ->get();
        $puertos=DB::table('puerto_olt as puertos')
        ->join('tarjeta_olt as tarjetas','puertos.idtarjeta_olt','=','tarjetas.idtarjeta_olt')
        ->join('olt as olts','tarjetas.idolt','=','olts.idolt')
        ->select('puertos.idpuerto_olt','tarjetas.idtarjeta_olt','olts.idolt','olts.nombre as nombre','tarjetas.nombre_tarjeta','tarjetas.idolt','puertos.nombre_puerto','puertos.numero_puerto','puertos.vlan')
        ->where('puertos.idpuerto_olt','=',$id)
        ->get();
        return view('puerto.edit', compact('tarjetas','puertos'));
        
    }

   
    public function update(Request $request, string $id)
    {
        $puerto = Puerto_olt::findOrFail($id);
        $puerto->nombre_puerto=$request->input('nombre_puerto');
        $puerto->numero_puerto=$request->input('numero_puerto');
        $puerto->vlan=$request->input('vlan');
        $puerto->update();

        return back()->with('success', 'Registro ingresado correctamente.');
    }

    
    public function destroy(string $id)
    {
        $puerto=Puerto_olt::findOrFail($id);
        $puerto->delete();
        return back()->with('success', 'Registro eliminado correctamente.');
    }
}
