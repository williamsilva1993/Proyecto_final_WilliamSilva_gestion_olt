<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsuarioFormRequest;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('seguridad.index');
    }


    public function create()
    {
        $usuarios = DB::table('users')
            ->get();
        return view('seguridad.create', compact('usuarios'));
    }


    public function store(UsuarioFormRequest $request)
    {
        $usuario=new User;
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->pasword = Crypt::encryptString($request->get('pasword'));
        //$usuario->rol=$request->get('rol');
        $usuario->save();

        return back()->with('success', 'Registro ingresado correctamente.');
    }


    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        $usuarios = DB::table('users')
            ->get();
        return view('seguridad.edit', compact('usuario', 'usuarios'));
    }


    public function update(UsuarioFormRequest $request, string $id)
    {
        $usuario=User::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->pasword = Crypt::encryptString($request->get('pasword'));
        //$usuario->rol=$request->get('rol');
        $usuario->update();

        return Redirect::to('/seguridad/create')->with('success', 'Registro actualizado correctamente.');
    }


    public function destroy(string $id)
    {
        $usuario=DB::table('users')->where('id','=',$id)->delete();
        return back()->with('success', 'Registro eliminado correctamente.');
    }
}
