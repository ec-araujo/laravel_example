<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    use HasFactory;
    protected $table = 'relatorios';

    protected $fillable = [
        'identificador',
        'data_do_ocorrido',
        'intervencao',
        'cidade_ocorrencia',
        'bairro_ocorrencia',
        'rua_ocorrencia',
        'num_ocorrencia',
        'pref_ocorrencia',
        'nome_solicitante',
        'telefone_solicitante',
        'nome_militar',
        'numfun_militar',
        'fun_militar',
        'tipo_de_ocorrencia',
        'horario_acionamento',
        'horario_chegada',
        'horario_termino',
        'descrição_ocorrencia',
        'hist_ocorrencia',
        'vitimas',
        'orgaos_ocorrencia',
        'situacao',
    ];
}
