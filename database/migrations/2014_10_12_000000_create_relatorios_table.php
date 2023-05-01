<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id();
            $table->integer('identificador');
            $table->string('tipo_de_ocorrencia');
            $table->timestamps();
            $table->date('data_do_ocorrido');
            $table->time('horario_acionamento');
            $table->time('horario_chegada');
            $table->time('horario_termino');
            $table->string('cidade_ocorrencia');
            $table->string('bairro_ocorrencia');
            $table->string('endereço_ocorrencia');
            $table->string('nome_solicitante');
            $table->string('telefone_solicitante');
            $table->string('descrição_ocorrencia');
            $table->integer('vitimas');

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
