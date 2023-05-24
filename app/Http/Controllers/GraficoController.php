<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{

    public function index()
    {
        $dados = DB::table('relatorios')
        ->select(DB::raw('MONTH(data_do_ocorrido) as mes'), DB::raw('COUNT(*) as total'))
        ->groupBy('mes')
        ->get();

        $infos = DB::table('relatorios')->get();

        //return view('dashboard', compact('dados', 'infos'));
        
    
    return view('dashboard')
    ->with('infos', $infos)
    ->with('dados', $dados);

    }
    
}


