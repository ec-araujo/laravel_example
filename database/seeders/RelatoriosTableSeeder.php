<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Integer;
use Illuminate\Support\Carbon;

class RelatoriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
        //    'Incêndio Comercial',
        //     'Incêndio Residencial',
        //    'Incêndio Florestal/Vegetação',
        //    'Incêndio em Lixo',
        //    'Extermínio/Captura de Abelhas',
        //    'Captura de Cobras/Serpentes',
        //    'Atendimento Pré-Hospitalar',
        //    'Prevenções a Acidentes',      
                    ];
                    
        $valorIncComer = 42; //valor correspondente da quantidade de incendios comercial
        $valorIncResid = 182; //valor correspondente da quantidade de incendios residencial
        $valorIncFlore = 47; //valor correspondente da quantidade de incendios florestal/vegetação
        $valorExtCap = 19;   //valor correspondente da quantidade de extermínio/captura de abelhas
        $valorCapCob = 7;   //valor correspondente da quantidade de captura de cobras/serpentes
        $valorAPH = 214;      //valor correspondente da quantidade de atendimento pré-hospitalar
        $valorPrevAci = 35;  //valor correspondente da quantidade de prevençoes a acidentes
        
        $incendioLixoRepeated = array_fill(0, $valorIncComer, 'Incêndio Comercial');
        $tipos = array_merge($tipos, $incendioLixoRepeated);

        $incendioLixoRepeated = array_fill(0, $valorIncResid, 'Incêndio Residencial');
        $tipos = array_merge($tipos, $incendioLixoRepeated);

        $incendioLixoRepeated = array_fill(0, $valorIncFlore, 'Incêndio Florestal/Vegetação');
        $tipos = array_merge($tipos, $incendioLixoRepeated);

        $incendioLixoRepeated = array_fill(0, $valorExtCap, 'Extermínio/Captura de Abelhas');
        $tipos = array_merge($tipos, $incendioLixoRepeated);

        $incendioLixoRepeated = array_fill(0, $valorCapCob, 'Captura de Cobras/Serpentes');
        $tipos = array_merge($tipos, $incendioLixoRepeated);

        $incendioLixoRepeated = array_fill(0, $valorAPH, 'Atendimento Pré-Hospitalar');
        $tipos = array_merge($tipos, $incendioLixoRepeated);

        $incendioLixoRepeated = array_fill(0, $valorPrevAci, 'Prevenções a Acidentes');
        $tipos = array_merge($tipos, $incendioLixoRepeated);

        foreach ($tipos as $tipo) {

            $date = now();

            $acionamento = Carbon::now()->subDays(rand(1, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59));
            $chegada = Carbon::now()->subDays(rand(0, 10))->subHours(rand(0, 23))->subMinutes(rand(0, 59));
            $termino = Carbon::now()->subDays(rand(0, 7))->subHours(rand(0, 23))->subMinutes(rand(0, 59));
            
            $date_2023 = Carbon::create(2022, rand(1, 12), rand(1, 31), rand(0, 23), rand(0, 59), rand(0, 59));
            
            $identificador = rand(20230520001, 20230520999);
            
            $cidades = [
                'Salvador',
                'Feira de Santana',
                'Vitória da Conquista',
                'Camaçari',
                'Itabuna',
                'Juazeiro',
                'Lauro de Freitas',
                'Ilhéus',
                'Porto Seguro',
                'Paulo Afonso'
            ];
            
            $randomCidade = $cidades[array_rand($cidades)];

            $intevention = [
                'Com Intervenção',
                'Sem Intervenção',
                'Não Finalizada',
            ];
            
            $randomIntervencao = $intevention[array_rand($intevention)];

            $nomesSolicitante = [
                'Aurora Whitman',
                'Lucas Montgomery',
                'Isabella Hawthorne',
                'Benjamin Sterling',
                'Olivia Sinclair',
                'Gabriel Prescott',
                'Sophia Harrington',
                'Ethan Monroe',
                'Ava Kensington',
                'Noah Donovan'
            ];
            
            $randomNomeSolicitante = $nomesSolicitante[array_rand($nomesSolicitante)];

            $militarSolicitante = [
                'João',
                'Maria',
                'Pedro',
                'Ana',
                'Lucas',
                'Isabela',
                'Gabriel',
                'Laura',
                'Matheus',
                'Beatriz'
            ];
            
            $randomMilitarSolicitante = $militarSolicitante[array_rand($militarSolicitante)];

            $militarFun = [
                '1ºGBM/OPE/CMD',
                '2ºGBM/OPE/CMD',
                '3ºGBM/OPE/CMD',
                '4ºGBM/OPE/CMD',
                '5ºGBM/OPE/CMD',
                '6ºGBM/OPE/CMD',
                '7ºGBM/OPE/CMD',
                '8ºGBM/OPE/CMD',
                '9ºGBM/OPE/CMD',
                '10ºGBM/OPE/CMD',
                '11ºGBM/OPE/CMD',
                '12ºGBM/OPE/CMD'
            ];
            
            $randomMilitarFuncao = $militarFun[array_rand($militarFun)];

            $vitimasstr = [
                'Sem Vítima',
                'Vítima Fatal',
                'Vítima não Fatal'
            ];
            
            $randomVitimas = $vitimasstr[array_rand($vitimasstr)];

            $orgaos = [
                'PM, TRÂNSITO',
                'PRF, PM',
                'PM',
                'PRF'
            ];
            
            $randomOrgaos = $orgaos[array_rand($orgaos)];

            $Viaturas = [
                'ABT',
                'ABTS',
                'AEPA',
                'UR'
            ];
            
            $randomViaturas = $Viaturas[array_rand($Viaturas)];


        DB::table('relatorios')->insert([
            'identificador' => $identificador,
            'created_at' => now(),
            'data_do_ocorrido' => $date_2023,

            'intervencao' => $randomIntervencao,

            'cidade_ocorrencia' => $randomCidade,
            'bairro_ocorrencia' => $randomCidade,
            'rua_ocorrencia' => $randomCidade,
            'num_ocorrencia' => rand(001, 999),
            'pref_ocorrencia' => $randomCidade,

            'nome_solicitante' => $randomNomeSolicitante,
            'telefone_solicitante' => "75999874598",

            'nome_militar' => $randomMilitarSolicitante,
            'numfun_militar' => rand(42000001, 99999999),
            'fun_militar' => $randomMilitarFuncao,

            'tipo_de_ocorrencia' => $tipo,

            'horario_acionamento' => $acionamento,
            'horario_chegada' => $chegada,
            'horario_termino' => $termino,
            'descrição_ocorrencia' => Str::random(10),

            'hist_ocorrencia' => Str::random(25),

            'vitimas' => $randomVitimas,
            'orgaos_ocorrencia' => $randomOrgaos,

            'tipo_de_viatura' => $randomViaturas,
            'placa_viatura' => Str::random(7),
            'quant_guar' => Str::random(1),

            'situacao' => "Não visto",
        ]);
        }
    }
}
