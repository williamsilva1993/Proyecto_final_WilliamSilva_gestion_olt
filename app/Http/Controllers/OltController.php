<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Olt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class OltController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('olt.index');
    }


    public function create()
    {
        $olts = DB::table('olt')
            ->get();
        return view('olt.create', compact('olts'));
    }


    public function store(Request $request)
    {
        $olt = new Olt;
        $olt->nombre = $request->input('nombre');
        $olt->marca = $request->input('marca');
        $olt->modelo = $request->input('modelo');
        $olt->numero_slot = $request->input('numero_slot');
        $olt->ipconexion = $request->input('ipconexion');
        $olt->puerto = $request->input('puerto');
        $olt->estado = 'Activo';
        $olt->save();

        return back()->with('success', 'Registro ingresado correctamente.');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $olt = Olt::findOrFail($id);
        $olts = DB::table('olt')
            ->get();
        return view('olt.edit', compact('olt', 'olts'));
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
        $olt->estado = 'Activo';
        $olt->update();

        return Redirect::to('/olt/create')->with('success', 'Registro actualizado correctamente.');
    }


    public function destroy(string $id)
    {
        $olt = Olt::findOrFail($id);
        $olt->estado = 'Inactivo';
        $olt->update();
        return back()->with('success', 'Registro eliminado correctamente.');
    }
}
