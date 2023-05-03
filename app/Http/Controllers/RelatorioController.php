<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relatorio;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $query = Relatorio::query();
    
        if ($request->has('data_do_ocorrido')) {
            $query->where('data_do_ocorrido', $request->input('data_do_ocorrido'));
        }
    
        if ($request->has('tipo_de_ocorrencia')) {
            $query->where('tipo_de_ocorrencia', 'LIKE', '%' . $request->input('tipo_de_ocorrencia') . '%');
        }
    
        $relatorios = $query->get();
    
        return view('relatorios', ['relatorios' => $relatorios]);
    }
}
