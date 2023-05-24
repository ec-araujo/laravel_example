<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relatorio;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Relatorio::all();

        return view('dashboard', ['relatorios' => $data]);
    }

    function show()
    {
        //return Relatorio::all();
    }

    public function index3()
    {
        $dados = DB::table('relatorios')
            ->select(DB::raw('MONTH(data_do_ocorrido) as mes'), DB::raw('COUNT(*) as total'))
            ->groupBy('mes')
            ->get();

        return view('dashboard', ['dados' => $dados]);
    }

    public function index2()
    {
        $dados = DB::table('relatorios')
            ->select(DB::raw('MONTHNAME(data_do_ocorrido) as mes'), DB::raw('COUNT(*) as total'))
            ->groupBy('mes')
            ->get();

        $roles = DB::table('relatorios')->get();
        //return view('dashboard', compact('dados', 'infos'));


        //cria um array chamado occurrences, busca cada "$item" dentro do database "$role" 
        $occurrences = [];
        foreach ($roles as $item) {
            //month recebe o 'mes' da a coluna "data_do_ocorrido" dentro da tabela relatorios
            $month = date('m', strtotime($item->data_do_ocorrido));
            //se 
            if (!isset($occurrences[$month])) {
                $occurrences[$month] = 0;
            }
            //caso não seja nulo adicione o item no mes e dentro do array ocurrences
            $occurrences[$month]++;
        }
        //cria um array para receber os valores
        $chartData = [];
        //para mes igual a 1 até mes igual a 12, e adicionar 1 a cada vez
        for ($month = 1; $month <= 12; $month++) {
            //na variavel label utilizando da classe carbon::create, pegamos o nome do mes de acordo com as datas brasileiras
            $label = Carbon::create(null, $month, 1)->locale('pt_BR')->monthName;
            //na variavel value ele busca 
            $value = isset($occurrences[str_pad($month, 2, '0', STR_PAD_LEFT)]) ? $occurrences[str_pad($month, 2, '0', STR_PAD_LEFT)] : 0;
            $chartData[] = [
                'x' => $label,
                'y' => $value,
            ];
        }

        $ocorrencias = DB::table('relatorios')
        ->select('tipo_de_ocorrencia', DB::raw('COUNT(*) as count'))
        ->groupBy('tipo_de_ocorrencia')
        ->get();

        foreach ($ocorrencias as $role) {
            $tipoDeOcorrencia = $role->tipo_de_ocorrencia;
            $quantidade = $role->count;
            $chartDouData[] = [
                'x' => $tipoDeOcorrencia,
                'y' => $quantidade,
            ];
            // Faça algo com $tipoDeOcorrencia e $quantidade
        }

        return view('dashboard')
            ->with('roles', $roles)
            ->with('dados', $dados)
            //->with('ocurrences', $occurrences)
            ->with('chartData', $chartData)
            ->with('ocorrencias', $ocorrencias)
            ->with('chartDouData', $chartDouData);
    }
}
