<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta_olt;
use Illuminate\Support\Facades\DB;

class Tarjeta_oltController extends Controller
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
        $olt = DB::table('olt')
            ->where('idolt', '=', $id)
            ->get();
        $tarjetas = DB::table('tarjeta_olt as tarjetas')
            ->join('olt as olts', 'tarjetas.idolt', '=', 'olts.idolt')
            ->select('tarjetas.idtarjeta_olt', 'olts.idolt', 'tarjetas.nombre_tarjeta', 'tarjetas.numero_slot', 'tarjetas.cantidad_puerto', 'tarjetas.estado as estadotarjeta', 'olts.nombre as nombreolt')
            ->where('tarjetas.estado', '=', 'Activo')
            ->where('olts.idolt', '=', $id)
            ->get();
        return view('tarjeta.create', compact('olt', 'tarjetas'));
    }



    public function store(Request $request)
    {
        $tarjeta = new Tarjeta_olt;
        $tarjeta->idolt = $request->input('idolt');
        $tarjeta->nombre_tarjeta = $request->input('nombre_tarjeta');
        $tarjeta->numero_slot = $request->input('numero_slot');
        $tarjeta->cantidad_puerto = $request->input('cantidad_puerto');
        $tarjeta->estado = 'Activo';
        $tarjeta->save();

        return back()->with('success', 'Registro ingresado correctamente.');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        
        $tarjetas = DB::table('tarjeta_olt as tarjetas')
            ->join('olt as olts', 'tarjetas.idolt', '=', 'olts.idolt')
            ->select('tarjetas.idtarjeta_olt', 'olts.idolt', 'tarjetas.nombre_tarjeta', 'tarjetas.numero_slot', 'tarjetas.cantidad_puerto', 'tarjetas.estado as estadotarjeta', 'olts.nombre as nombreolt')
            ->where('tarjetas.estado', '=', 'Activo')
            ->where('tarjetas.idtarjeta_olt', '=', $id)
            ->get();
        return view('tarjeta.edit', compact('tarjetas'));
    }


    public function update(Request $request, string $id)
    {
        $tarjeta = Tarjeta_olt::findOrFail($id);
        $tarjeta->nombre_tarjeta = $request->input('nombre_tarjeta');
        $tarjeta->numero_slot = $request->input('numero_slot');
        $tarjeta->cantidad_puerto = $request->input('cantidad_puerto');
        $tarjeta->estado = 'Activo';
        $tarjeta->update();

        return back()->with('success', 'Registro ingresado correctamente.');
    }


    public function destroy(string $id)
    {
        $tarjeta=Tarjeta_olt::findOrFail($id);
        $tarjeta->estado='Inactivo';
        $tarjeta->update();
        return back()->with('success', 'Registro eliminado correctamente.');
    }
}
