<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id(); //relatorio ID
            $table->bigInteger('identificador'); //n da ocorrencia
            $table->timestamps(); //data do preenchimento do relatorio
            $table->date('data_do_ocorrido'); //data da ocorrencia

            $table->string('intervencao'); //número da ocorrência

            $table->string('cidade_ocorrencia'); //cidade da ocorrencia
            $table->string('bairro_ocorrencia');
            $table->string('rua_ocorrencia');
            $table->string('num_ocorrencia');
            $table->string('pref_ocorrencia');

            $table->string('nome_solicitante');
            $table->string('telefone_solicitante');

            $table->string('nome_militar');
            $table->string('numfun_militar');
            $table->string('fun_militar');

            $table->string('tipo_de_ocorrencia');

            $table->time('horario_acionamento');
            $table->time('horario_chegada');
            $table->time('horario_termino');
            $table->string('descrição_ocorrencia');

            $table->string('hist_ocorrencia');

            $table->string('vitimas');
            $table->string('orgaos_ocorrencia');

            //viatura
            $table->string('tipo_de_viatura');
            $table->string('placa_viatura');
            $table->string('quant_guar');

            $table->string('situacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vitimas');
    }
};
