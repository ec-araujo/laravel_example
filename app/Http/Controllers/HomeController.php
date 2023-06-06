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

    public function index2()
    {
        $dados = DB::table('relatorios')
            ->select(DB::raw('MONTHNAME(data_do_ocorrido) as mes'), DB::raw('COUNT(*) as total'))
            ->groupBy('mes')
            ->get();

        $dados002 = DB::table('relatorios')
            ->select(DB::raw('YEAR(data_do_ocorrido) as ano'), DB::raw('MONTH(data_do_ocorrido) as mes'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('YEAR(data_do_ocorrido)'), DB::raw('MONTH(data_do_ocorrido)'))
            ->orderBy(DB::raw('YEAR(data_do_ocorrido)'), 'asc')
            ->orderBy(DB::raw('MONTH(data_do_ocorrido)'), 'asc')
            ->get();

        $roles = DB::table('relatorios')->paginate(10);
        $func = DB::table('relatorios')->get();
        //return view('dashboard', compact('dados', 'infos'));

        //cria o array para o ano passado
        $occurrencesanopassado = [];
        $yearPassado = date('Y') - 1;
        foreach ($func as $item) {
            $date = strtotime($item->data_do_ocorrido);
            $item_year = date('Y', $date);

            if ($item_year == $yearPassado) {
                //month recebe o 'mes' da a coluna "data_do_ocorrido" dentro da tabela relatorios
                $month = date('m', $date);

                if (!isset($occurrencesanopassado[$month])) {
                    $occurrencesanopassado[$month] = 0;
                }
                //caso não seja nulo adicione o item no mes e dentro do array ocurrences
                $occurrencesanopassado[$month]++;
            }
        }
        //cria um array para receber os valores
        $chartDataPassado = [];
        //para mes igual a 1 até mes igual a 12, e adicionar 1 a cada vez
        for ($month = 1; $month <= 12; $month++) {
            //na variavel label utilizando da classe carbon::create, pegamos o nome do mes de acordo com as datas brasileiras
            $label = Carbon::create(null, $month, 1)->locale('pt_BR')->monthName;
            //na variavel value ele busca
            $value = isset($occurrencesanopassado[str_pad($month, 2, '0', STR_PAD_LEFT)]) ? $occurrencesanopassado[str_pad($month, 2, '0', STR_PAD_LEFT)] : 0;
            $chartDataPassado[] = [
                'x' => $label,
                'y' => $value,
            ];
        }

        $occurrencesanoatual = [];
        $yearAtual = date('Y');
        foreach ($func as $item) {
            $date = strtotime($item->data_do_ocorrido);
            $item_year = date('Y', $date);

            if ($item_year == $yearAtual) {
                //month recebe o 'mes' da a coluna "data_do_ocorrido" dentro da tabela relatorios
                $month = date('m', $date);

                if (!isset($occurrencesanoatual[$month])) {
                    $occurrencesanoatual[$month] = 0;
                }
                //caso não seja nulo adicione o item no mes e dentro do array ocurrences
                $occurrencesanoatual[$month]++;
            }
        }
        //cria um array para receber os valores
        $chartDataAtual = [];
        //para mes igual a 1 até mes igual a 12, e adicionar 1 a cada vez
        for ($month = 1; $month <= 12; $month++) {
            //na variavel label utilizando da classe carbon::create, pegamos o nome do mes de acordo com as datas brasileiras
            $label = Carbon::create(null, $month, 1)->locale('pt_BR')->monthName;
            //na variavel value ele busca
            $value = isset($occurrencesanoatual[str_pad($month, 2, '0', STR_PAD_LEFT)]) ? $occurrencesanoatual[str_pad($month, 2, '0', STR_PAD_LEFT)] : 0;
            $chartDataAtual[] = [
                'x' => $label,
                'y' => $value,
            ];
        }

        //cria o array para todo os valores
        $occurrencestotal = [];
        foreach ($func as $item) {
            $month = date('m', strtotime($item->data_do_ocorrido));
            if (!isset($occurrencestotal[$month])) {
                $occurrencestotal[$month] = 0;
            }
            $occurrencestotal[$month]++;
        }

        //cria um array para receber os valores
        $chartData = [];
        //para mes igual a 1 até mes igual a 12, e adicionar 1 a cada vez
        for ($month = 1; $month <= 12; $month++) {
            //na variavel label utilizando da classe carbon::create, pegamos o nome do mes de acordo com as datas brasileiras
            $label = Carbon::create(null, $month, 1)->locale('pt_BR')->monthName;
            //na variavel value ele busca
            $value = isset($occurrencestotal[str_pad($month, 2, '0', STR_PAD_LEFT)]) ? $occurrencestotal[str_pad($month, 2, '0', STR_PAD_LEFT)] : 0;
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
            $dughDataLabel[] = $tipoDeOcorrencia;
            $dughDataValue[] = $quantidade;
            // Faça algo com $tipoDeOcorrencia e $quantidade
        }

        


        return view('dashboard')
            ->with('roles', $roles)
            ->with('dados', $dados)
            ->with('dughDataLabel', $dughDataLabel)
            ->with('dughDataValue', $dughDataValue)
            //->with('ocurrences', $occurrences)
            ->with('chartData', $chartData)
            ->with('chartDataPassado', $chartDataPassado)
            ->with('chartDataAtual', $chartDataAtual)
            ->with('ocorrencias', $ocorrencias)
            ->with('chartDouData', $chartDouData);
    }


    public function index3()
    {
        $dados = DB::table('relatorios')
            ->select(DB::raw('MONTH(data_do_ocorrido) as mes'), DB::raw('COUNT(*) as total'))
            ->groupBy('mes')
            ->get();

        return view('dashboard', ['dados' => $dados]);
    }
}
