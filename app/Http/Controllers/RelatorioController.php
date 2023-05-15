<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relatorio;
use Illuminate\Support\Facades\Auth;

class RelatorioController extends Controller
{
    function show(){
        
        //return Relatorio::all();

        $data = Relatorio::all();
        return view('dashboard',['relatorios'=>$data]);
        

    }

    function index(){

        $usuario = Auth::user();
        return view('criar', compact('usuario'));
    }
}
