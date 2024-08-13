<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $olts = DB::table('olt')
        ->where('estado','=','Activo')
            ->get();    
        return view('layouts.index', compact('olts'));
    } 
 
}