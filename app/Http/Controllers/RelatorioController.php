<?php

namespace App\Http\Controllers;

use Carbon\Traits\ToStringFormat;
use Illuminate\Http\Request;
use App\Models\Relatorio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RelatorioController extends Controller
{
    function show(){
        
        //return Relatorio::all();

        $data = Relatorio::all();
        return view('dashboard',['relatorios'=>$data]);

    }

    public function salvarDados(Request $request)
    {

        $usuario = Auth::user();
        $seuModelo = new Relatorio(); // Substitua 'SeuModelo' pelo nome do seu modelo

        $interSele = $request->input('intervencao');
        $vitimasSele = $request->input('vitimas');
        $ocorrSele = $request->input('orgaos_ocorrencia');//verificar

        $aciSele = $request->input('horario_acionamento');
        $cheSele = $request->input('horario_chegada');
        $terSele = $request->input('horario_termino');

        // Transformar o array em uma string separada por vírgulas
        $interString = implode(', ', $interSele);
        $vitimasString = implode(', ', $vitimasSele);
        $ocorrString = implode(', ', $ocorrSele);

        $aciFormatada = date('H:i', strtotime($aciSele));
        $cheFormatada = date('H:i', strtotime($cheSele));
        $terFormatada = date('H:i', strtotime($terSele));

        // Atribua os valores dos inputs do formulário aos campos do modelo
        $seuModelo->identificador = $request->input('identificador');
        $seuModelo->data_do_ocorrido = $request->input('data_do_ocorrido');

        $seuModelo->intervencao = $interString;

        $seuModelo->cidade_ocorrencia = $request->input('cidade_ocorrencia');
        $seuModelo->bairro_ocorrencia = $request->input('bairro_ocorrencia');
        $seuModelo->rua_ocorrencia = $request->input('rua_ocorrencia');
        $seuModelo->num_ocorrencia = $request->input('num_ocorrencia');
        $seuModelo->pref_ocorrencia = $request->input('pref_ocorrencia');
        $seuModelo->nome_solicitante = $request->input('nome_solicitante');
        $seuModelo->telefone_solicitante = $request->input('telefone_solicitante');

        //informações do militar que gerou a ocorrencia
        $seuModelo->nome_militar = $usuario->name;
        $seuModelo->numfun_militar = $usuario->num_funcional;
        $seuModelo->fun_militar = $usuario->role;


        $seuModelo->tipo_de_ocorrencia = $request->input('tipo_de_ocorrencia');

        //horarios
        $seuModelo->horario_acionamento = $aciFormatada;
        $seuModelo->horario_chegada = $cheFormatada;
        $seuModelo->horario_termino = $terFormatada;


        $seuModelo->descrição_ocorrencia = $request->input('descrição_ocorrencia');
        $seuModelo->hist_ocorrencia = $request->input('hist_ocorrencia');

        $seuModelo->vitimas = $vitimasString;
        $seuModelo->orgaos_ocorrencia = $ocorrString;

        //viatura
        $seuModelo->tipo_de_viatura = $request->input('tipo_de_viatura');
        $seuModelo->placa_viatura = $request->input('placa_viatura');
        $seuModelo->quant_guar = $request->input('quant_guar');


        $seuModelo->situacao = "não visto";
        // Atribua mais campos conforme necessário

        // Salve os dados no banco de dados
        $seuModelo->save();

        // Redirecione ou retorne uma resposta adequada após salvar os dados
        //return redirect()->back()->with('success', 'Dados salvos com sucesso!');
        return redirect('criar')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function listaNumRelatorio($cidade)
    {
        $cidadesOco = DB::table('relatorios')
            ->select('tipo_de_ocorrencia', DB::raw('COUNT(*) as count'))
            ->groupBy('tipo_de_ocorrencia')
            ->where('cidade_ocorrencia', 'like', '%' . $cidade . '%')
            ->get();
    
        $dughDataLabel = [];
        $dughDataValue = [];
    
        foreach ($cidadesOco as $role) {
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
    
        return response()->json([
            'dughDataLabel' => $dughDataLabel,
            'dughDataValue' => $dughDataValue,
        ]);
    }

    public function OrderData($postData){ // This is the function which I want to call from ajax
        //do something awesome with that post data 
        return "I am in";
    }

    function index(){

        $usuario = Auth::user();  //pega table usuario que está logado
        $informa = DB::table('relatorios')->get(); // pega a table relatórios
        $ano = date('Y'); //retorna o ano
        $mes = date('m'); //retorna o mes
        
        $mesAtual = Carbon::now()->month; //retorna o mes

        $totalRegistros = Relatorio::whereMonth('created_at', $mesAtual)->count();  //dentro da table relatorio, pega a coluna created at, baseado no mes de criação, conta quantos registros foram feitos e entrega o número para a variavel totalRegistros


        $listaNomes = ['Master', 'DMT', 'COBM', 'COBMI', '1ºGBM/SPO', '1ºGBM/OP/CMD']; // cria uma lista conforme as possibilidades de funções que um usuário pode ter
        $listaNumeros = []; //variavel para segurar os números que seram atribuidos conforme os Nomes
        foreach ($listaNomes as $indice => $nome) { //vai buscar 
        $numero = $indice + 1;
        $listaNumeros[$nome] = $numero;
        }
        $nomeBuscado = $usuario->role; //busca a função do usuário
        $numeroEncontrado = $listaNumeros[$nomeBuscado]; //atribui baseado na função do usuario o valor correspondente (master-1,DMT-2 ...)

        if($totalRegistros<9){  //adiciona zeros para criar um número de registro de ocorrencia
            $totalRegistros = '000'.($totalRegistros+1);
        } elseif($totalRegistros<99){
            $totalRegistros = '00'.($totalRegistros+1);
        } elseif($totalRegistros<999){
            $totalRegistros = '0'.($totalRegistros+1);
        }

          
          // Exemplo de busca pelo número correspondente ao nome 'Maria'
          //$nomeBuscado = 'Master';

            $numeral = $ano . $mes .  $numeroEncontrado . ($totalRegistros);
        
            $dataFormatada = $numeroEncontrado;

        //return view('criar', compact('usuario'));
        return view('criar')
        ->with('usuario', $usuario)
        ->with('dataFormatada',$numeral)
        ->with('informa', $informa);
    }

    function indexAbrir($variavel = null){

        $usuario = Auth::user();  //pega table usuario que está logado
        $informa = DB::table('relatorios')->get(); // pega a table relatórios
        $ano = date('Y'); //retorna o ano
        $mes = date('m'); //retorna o mes
        
        $mesAtual = Carbon::now()->month; //retorna o mes

        $totalRegistros = Relatorio::whereMonth('created_at', $mesAtual)->count();  //dentro da table relatorio, pega a coluna created at, baseado no mes de criação, conta quantos registros foram feitos e entrega o número para a variavel totalRegistros


        $listaNomes = ['Master', 'DMT', 'COBM', 'COBMI', '1ºGBM/SPO', '1ºGBM/OP/CMD']; // cria uma lista conforme as possibilidades de funções que um usuário pode ter
        $listaNumeros = []; //variavel para segurar os números que seram atribuidos conforme os Nomes
        foreach ($listaNomes as $indice => $nome) { //vai buscar 
        $numero = $indice + 1;
        $listaNumeros[$nome] = $numero;
        }
        $nomeBuscado = $usuario->role; //busca a função do usuário
        $numeroEncontrado = $listaNumeros[$nomeBuscado]; //atribui baseado na função do usuario o valor correspondente (master-1,DMT-2 ...)

        if($totalRegistros<9){  //adiciona zeros para criar um número de registro de ocorrencia
            $totalRegistros = '000'.($totalRegistros+1);
        } elseif($totalRegistros<99){
            $totalRegistros = '00'.($totalRegistros+1);
        } elseif($totalRegistros<999){
            $totalRegistros = '0'.($totalRegistros+1);
        }

          
          // Exemplo de busca pelo número correspondente ao nome 'Maria'
          //$nomeBuscado = 'Master';

            $numeral = $ano . $mes .  $numeroEncontrado . ($totalRegistros);
        
            $columnData2 = Relatorio::pluck('identificador')->toArray();

        //return view('criar', compact('usuario'));
        return view('abrir')
        ->with('usuario', $usuario)
        ->with('dataFormatada',$numeral)
        ->with('columnData2',$columnData2)
        ->with('identificador',$variavel)
        ->with('informa', $informa);
    }

    public function askServer($identificador)
    {
        //$relatorio = Relatorio::find($identificador);
        // ou
        $relatorio = Relatorio::firstWhere('identificador', $identificador);
    
        if ($relatorio) {
            // A linha foi encontrada, faça algo com ela
            $op_data = $relatorio->data_do_ocorrido;
            $op_cidade = $relatorio->cidade_ocorrencia;
            $op_bairro = $relatorio->bairro_ocorrencia;
            $op_rua = $relatorio->rua_ocorrencia;
            $op_num = $relatorio->num_ocorrencia;
            $op_pref = $relatorio->pref_ocorrencia;

            $op_nome_sol = $relatorio->nome_solicitante;
            $op_tel_sol = $relatorio->telefone_solicitante;

            $op_nome_mil = $relatorio->nome_militar;
            $op_num_mil = $relatorio->numfun_militar;
            $op_fun_mil = $relatorio->fun_militar;

            $op_tipo = $relatorio->tipo_de_ocorrencia;
            $op_hor_aci = $relatorio->horario_acionamento;
            $op_hor_che = $relatorio->horario_chegada;
            $op_hor_ter = $relatorio->horario_termino;
            $op_desc = $relatorio->descrição_ocorrencia;
            $op_hist = $relatorio->hist_ocorrencia;

            $op_vtr_tipo = $relatorio->tipo_de_viatura;
            $op_vtr_placa = $relatorio->placa_viatura;
            $op_vtr_guar = $relatorio->quant_guar;


            return response()->json([
                'abrir_data' => $op_data,
                'abrir_cidade' => $op_cidade,
                'abrir_bairro' => $op_bairro,
                'abrir_rua' => $op_rua,
                'abrir_num' => $op_num,
                'abrir_pref' => $op_pref,
                'abrir_nome_sol' => $op_nome_sol,
                'abrir_tel_sol' => $op_tel_sol,
                'abrir_nome_mil' => $op_nome_mil,
                'abrir_num_mil' => $op_num_mil,
                'abrir_fun_mil' => $op_fun_mil,
                'abrir_tipo' => $op_tipo,
                'abrir_hor_aci' => $op_hor_aci,
                'abrir_hor_che' => $op_hor_che,
                'abrir_hor_ter' => $op_hor_ter,
                'abrir_desc' => $op_desc,
                'abrir_hist' => $op_hist,
                'abrir_vtr_tipo' => $op_vtr_tipo,
                'abrir_vtr_placa' => $op_vtr_placa,
                'abrir_vtr_guar' => $op_vtr_guar
            ]);
        } else {
            // A linha não foi encontrada
            return response()->json(['message' => 'Relatório não encontrado'], 404);
        }
    }

    public function abrirId($identificador)
    {
        //$relatorio = Relatorio::firstWhere('identificador', $identificador);
        $columnData2 = Relatorio::pluck('identificador')->toArray();

        return view('abrir')
        ->with('columnData2',$columnData2)
        ->with('identificador', $identificador);
/*         if ($relatorio) {
            // A linha foi encontrada, faça algo com ela
            $op_data = $relatorio->data_do_ocorrido;
            $op_cidade = $relatorio->cidade_ocorrencia;
            $op_bairro = $relatorio->bairro_ocorrencia;
            $op_rua = $relatorio->rua_ocorrencia;
            $op_num = $relatorio->num_ocorrencia;
            $op_pref = $relatorio->pref_ocorrencia;

            $op_nome_sol = $relatorio->nome_solicitante;
            $op_tel_sol = $relatorio->telefone_solicitante;

            $op_nome_mil = $relatorio->nome_militar;
            $op_num_mil = $relatorio->numfun_militar;
            $op_fun_mil = $relatorio->fun_militar;

            $op_tipo = $relatorio->tipo_de_ocorrencia;
            $op_hor_aci = $relatorio->horario_acionamento;
            $op_hor_che = $relatorio->horario_chegada;
            $op_hor_ter = $relatorio->horario_termino;
            $op_desc = $relatorio->descrição_ocorrencia;
            $op_hist = $relatorio->hist_ocorrencia;

            $op_vtr_tipo = $relatorio->tipo_de_viatura;
            $op_vtr_placa = $relatorio->placa_viatura;
            $op_vtr_guar = $relatorio->quant_guar;


            return response()->json([
                'abrir_data' => $op_data,
                'abrir_cidade' => $op_cidade,
                'abrir_bairro' => $op_bairro,
                'abrir_rua' => $op_rua,
                'abrir_num' => $op_num,
                'abrir_pref' => $op_pref,
                'abrir_nome_sol' => $op_nome_sol,
                'abrir_tel_sol' => $op_tel_sol,
                'abrir_nome_mil' => $op_nome_mil,
                'abrir_num_mil' => $op_num_mil,
                'abrir_fun_mil' => $op_fun_mil,
                'abrir_tipo' => $op_tipo,
                'abrir_hor_aci' => $op_hor_aci,
                'abrir_hor_che' => $op_hor_che,
                'abrir_hor_ter' => $op_hor_ter,
                'abrir_desc' => $op_desc,
                'abrir_hist' => $op_hist,
                'abrir_vtr_tipo' => $op_vtr_tipo,
                'abrir_vtr_placa' => $op_vtr_placa,
                'abrir_vtr_guar' => $op_vtr_guar
            ]);
        } else {
            // A linha não foi encontrada
            return response()->json(['message' => 'Relatório não encontrado'], 404);
        } */
    }
}
