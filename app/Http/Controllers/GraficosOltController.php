<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Olt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class GraficosOltController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function edit(string $id)
    {
        $olt = Olt::findOrFail($id);
        $olts = DB::table('olt')
        ->where('idolt', '=', $id)
        ->get();
        return view('olt.graficos', compact('olt', 'olts'));
    }


    public function update(Request $request, string $id)
    {
        $olt = Olt::findOrFail($id);
        $olt->nombre = $request->input('nombre');
        $olt->marca = $request->input('marca');
        $olt->modelo = $request->input('modelo');
        $olt->numero_slot = $request->input('numero_slot');
        $olt->ipconexion = $request->input('ipconexion');
        $olt->puerto = $request->input('puerto');
        $olt->trafico = $request->input('trafico');
        $olt->disponibilidad = $request->input('disponibilidad');
        $olt->ping_dos_dias = $request->input('ping_dos_dias');
        $olt->estado = 'Activo';
        $olt->update();

        return Redirect::to('/olt/create')->with('success', 'Registro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
