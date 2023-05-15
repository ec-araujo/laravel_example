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
            'Fogo no mato',
            'Fogo em residência',
            'Fogo em fábrica',
            'Fogo em veículo',
            'Fogo no mato',
            'Fogo em residência',
            'Fogo em fábrica',
            'Fogo em veículo',

            
        ];

        foreach ($tipos as $tipo) {

            $date = now();
            $acionamento = Carbon::now()->subDays(rand(1, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59));
            $chegada = Carbon::now()->subDays(rand(0, 10))->subHours(rand(0, 23))->subMinutes(rand(0, 59));
            $termino = Carbon::now()->subDays(rand(0, 7))->subHours(rand(0, 23))->subMinutes(rand(0, 59));
            $date_2023 = Carbon::create(2023, rand(1, 12), rand(1, 31), rand(0, 23), rand(0, 59), rand(0, 59));
            $identificador = intval($date->format('Ymd'). rand(0, 999));
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

        DB::table('relatorios')->insert([
            'identificador' => $identificador,
            'tipo_de_ocorrencia' => $tipo,
            'created_at' => now(),
            'data_do_ocorrido' => $date_2023,
            'horario_acionamento' => $acionamento,
            'horario_chegada' => $chegada,
            'horario_termino' => $termino,
            'cidade_ocorrencia' => $randomCidade,
            'bairro_ocorrencia' => Str::random(5),
            'endereço_ocorrencia' => Str::random(15),
            'nome_solicitante' => $randomNomeSolicitante,
            'telefone_solicitante' => Integer::class,
            'descrição_ocorrencia' => Str::random(10),
            'vitimas' => rand(1, 5)
        ]);
        }
    }
}
