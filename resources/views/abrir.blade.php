@extends('layouts.app', ['activePage' => 'abrir', 'title' => 'Relator 1.0', 'navName' => 'Abrir', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">

                            <h4 class="card-title">Relatório de Ocorrência</h4>

                        </div>
                        <div class="card-body">

                            <form name="formcentro" id="formcentro">
                                @csrf
                                <div class="row justify-content-between">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>Nº da Ocorrência</label>

                                            <input id="identificador" name="identificador" type="text"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>Nº CICOM</label>
                                            <input type="text" class="form-control" name="num_cicom" id="num_cicom"
                                                value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 pl-1">
                                        <div class="form-group">
                                            <label>Data do Registro</label>
                                            <input type="date" class="form-control" id="data_registro" name="data_registro" value=""
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Data da Ocorrência</label>
                                            <input type="date" class="form-control" name="data_do_ocorrido"
                                                id="data_do_ocorrido" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Com Intervenção</label>
                                            <input type="checkbox" name="intervencao[]" class="form-control" id="checkbox4"
                                                value="Com Intervenção">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Sem Intervenção</label>
                                            <input type="checkbox" name="intervencao[]" class="form-control" id="checkbox5"
                                                value="Sem Intervenção">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Não Finalizada</label>
                                            <input type="checkbox" name="intervencao[]" class="form-control" id="checkbox6"
                                                value="Não Finalizada">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Motivo</label>
                                            <input type="text" class="form-control" id="textInputMot" disabled>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="card-title">Endereço da Ocorrência</h4>

                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <input id="cidade_ocorrencia" name="cidade_ocorrencia" type="text"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-1">
                                        <div class="form-group">
                                            <label>Bairro</label>
                                            <input id="bairro_ocorrencia" name="bairro_ocorrencia" type="text"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Rua</label>
                                            <input id="rua_ocorrencia" name="rua_ocorrencia" type="text"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-1 pl-1">
                                        <div class="form-group">
                                            <label>Nº</label>
                                            <input id="num_ocorrencia" name="num_ocorrencia" type="text"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>P. Referência</label>
                                            <input id="pref_ocorrencia" name="pref_ocorrencia" type="text"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Nome Solicitante</label>
                                            <input id="nome_solicitante" name="nome_solicitante" type="text"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input id="telefone_solicitante" name="telefone_solicitante" type="text"
                                                class="form-control" id="phoneNumberInput" value="" readonly>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="card-title">Informações da Ocorrência</h4>

                                <div class="row justify-content-between">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo de Ocorrência</label>
                                            <select id="tipo_de_ocorrencia" name="tipo_de_ocorrencia"
                                                class="form-control" value="" disabled>
                                                <option value=""></option>
                                                <option value="Incêndio Comercial">Incêndio Comercial</option>
                                                <option value="Incêndio Residencial">Incêndio Residencial</option>
                                                <option value="Incêndio Florestal/Vegetação">Incêndio Florestal/Vegetação
                                                </option>
                                                <option value="Incêndio em Lixo">Incêndio em Lixo</option>
                                                <option value="Extermínio/Captura de Abelhas">Extermínio/Captura de Abelhas
                                                </option>
                                                <option value="Captura de Cobras/Serpentes">Captura de Cobras/Serpentes
                                                </option>
                                                <option value="Atendimento Pré-Hospitalar">Atendimento Pré-Hospitalar
                                                </option>
                                                <option value="Prevenções a Acidentes">Prevenções a Acidentes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Acionamento</label>
                                            <input id="horario_acionamento" name="horario_acionamento" type="time"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Chegada</label>
                                            <input id="horario_chegada" name="horario_chegada" type="time"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Término</label>
                                            <input id="horario_termino" name="horario_termino" type="time"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descrição da Ocorrência</label>
                                            <input id="descrição_ocorrencia" name="descrição_ocorrencia"
                                                class="form-control" value="">
                                            <p></p>
                                            <h5 style="text-align: justify;text-justify: inter-word;">INCÊNDIO:
                                                Explosão, Incêndio em embarcações, Incêndio em estab. Comercial,
                                                Incêndio em estab. Industrial, Incêndio Florestal, Incêndio em
                                                prédio privado,
                                                Incêndio em prédio público, Incêndio em residência (casa/Apt),
                                                Incêndio em veículo, Incêndio em Vegetação, Incêndio /Vazamento
                                                GLP, Ocorrências com
                                                aeronaves, Ocorrência com Produtos Perigosos, Princípio de
                                                incêndio, outros tipos de incêndios. BUSCA E SALVAMENTO:
                                                Abertura de imóveis, Captura
                                                /salvamento de animal, Desabamento /Soterramento, Pré-Afogamento
                                                (não fatal), Afogamento (fatal), Resgate de cadáver,
                                                Retiradapessoas em elevador, Retirada
                                                das ferragens (acidente trânsito), Salvamento de pessoas,
                                                Tentativa de suicídio, Outras Buscas e Salvamentos. PREVENÇOES A
                                                ACIDENTES: Prevenção a
                                                Sinistros e Pânico (Ordem de Serviços), Palestras, Orientações.
                                                ATENDIMENTO PRÉ-HOSPITALAR: Queimadura, Agressão, Atendimento a
                                                parturiente,
                                                Acidente de trânsito, Mal súbito, Ferimento por arma branca,
                                                Ferimento por arma de fogo, Outros.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Histórico da Ocorrência</label>
                                            <textarea id="hist_ocorrencia" name="hist_ocorrencia" rows="4" cols="80" class="form-control"
                                                value=""></textarea>
                                            <p></p>
                                            <h5 style="text-align: justify;text-justify: inter-word;">
                                                HISTÓRICO/OBS: Deverão ser constados neste histórico, todos os
                                                dados relevantes à ocorrência tais como: Danos materiais
                                                causados ao imóvel, presença do proprietário, recursos
                                                utilizados, local provável do inicio do incêndio, meios de
                                                prevenção
                                                existentes no local (Extintores, iluminação, sinalização e
                                                saídas de emergência) e todos os outros dados importantes.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Sem Vítima</label>
                                            <input type="checkbox" name="vitimas[]" class="form-control" id="checkbox1"
                                                value="Sem Vítima">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Vítima Fatal</label>
                                            <input type="checkbox" name="vitimas[]" class="form-control" id="checkbox2"
                                                value="Vítima Fatal">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="text-align: center;">
                                            <label>Vítima não Fatal</label>
                                            <input type="checkbox" name="vitimas[]" class="form-control" id="checkbox3"
                                                value="Vítima não Fatal">
                                        </div>
                                    </div>
                                </div>

                                <h4 class="card-title">Orgãos na Ocorrência</h4>

                                <div class="row justify-content-between">
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>PRF</label>
                                            <input type="checkbox" name="orgaos_ocorrencia[]" value="PRF"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>IBAMA</label>
                                            <input type="checkbox" name="orgaos_ocorrencia[]" value="IBAMA"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>PM</label>
                                            <input type="checkbox" name="orgaos_ocorrencia[]" value="PM"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>DPT</label>
                                            <input type="checkbox" name="orgaos_ocorrencia[]" value="DPT"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>SAMU</label>
                                            <input type="checkbox" name="orgaos_ocorrencia[]" value="SAMU"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>GM</label>
                                            <input type="checkbox" name="orgaos_ocorrencia[]" value="GM"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>TRÂNSITO</label>
                                            <input type="checkbox" name="orgaos_ocorrencia[]" value="TRÂNSITO"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group" style="text-align: center;">
                                            <label>OUTROS</label>
                                            <input type="checkbox" name="orgaos_ocorrencia[]" value="OUTROS"
                                                class="form-control" id="enableCheckbox">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="text-align: center;">
                                            <label></label>
                                            <input type="text" class="form-control" id="textInput" value=""
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="card-title">Informações da guarnição</h4>

                                <div class="row justify-content-between">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Tipo de Viatura</label>
                                            <select id="tipo_de_viatura" name="tipo_de_viatura" class="form-control"
                                                value="" readonly>
                                                <option value=""></option>
                                                <option value="1">ABT</option>
                                                <option value="2">UR</option>
                                                <option value="3">ATB</option>
                                                <option value="4">ABTS</option>
                                                <option value="5">AEPA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Placa</label>
                                            <input id="placa_viatura" name="placa_viatura" type="text"
                                                class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Composição Guarnição</label>
                                            <input id="quant_guar" name="quant_guar" type="text" class="form-control"
                                                value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <div class="col-md-4">
                                    <div id="num-relatorio-busca" class="form-group">
                                        <input class="form-control typeahead" type="text"
                                            placeholder="Nº de Ocorrências">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info btn-fill pull-right">Buscar</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h3>How are you server ?</h3>
                                        <button class="ask-server">Ask</button>
                                    </div>
                                </div>
                            </div>
                            <p></p>

                            <h4 class="card-title">Informações do Militar</h4>

                        </div>
                        <div class="card-body">
                            <form name="formulario" id="formulario">
                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>Militar Solicitante</label>
                                            <input type="text" class="form-control" name="nome_militar"
                                               id="nome_militar" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label>Nº Funcional</label>
                                            <input type="text" class="form-control" name="numfun_militar"
                                               id="numfun_militar" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Função</label>
                                            <input type="text" class="form-control" name="fun_militar" value=""
                                               id="fun_militar" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Nº Autenticador</label>
                                            <input type="text" class="form-control" name="num_auten" value=""
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Última autenticação</label>
                                            <input type="text" class="form-control" name="num_ult_auten"
                                                value="" readonly>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="card-title">Informações Testemunha</h4>

                                <div class="row justify-content-between">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Testemunha 01</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label>Nº RG/CPF</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-1">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-between">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Testemunha 02</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label>Nº RG/CPF</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-1">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-between">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <h4 class="card-title">Informações Vítimas</h4>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nome">Nome: </label>
                                            <input type="text" class="form-control" id="nome" name="nome">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="endereco">Endereço: </label>
                                            <input type="text" class="form-control" id="endereco" name="endereco">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-sm pull-right"
                                                onclick="adicionarPessoa()">Adicionar Pessoa</button>
                                        </div>
                                    </div>
                                </div>


                                <h4 class="card-title">Informações Veículos</h4>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="marca">Marca: </label>
                                            <input type="text" class="form-control" id="marca" name="marca">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="modelo">Modelo: </label>
                                            <input type="text" class="form-control" id="modelo" name="modelo">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-sm pull-right"
                                                onclick="adicionarVeiculo()">Adicionar Veiculo</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });

        var relato = {!! json_encode($columnData2) !!};

        $('#num-relatorio-busca .typeahead').typeahead({
            hint: false,
            highlight: true,
            minLength: 1
        }, {
            name: 'relato',
            source: substringMatcher(relato)
        });

        // }
        //});



        $('#num-relatorio-busca .typeahead').on('typeahead:select', function(e, suggestion) {


            $.ajax({
                url: '/ask-server/' + suggestion,
                type: 'GET',
                success: function(response) {
                    // A solicitação foi bem-sucedida
                    var data = response.abrir_data;
                    var cidade = response.abrir_cidade;
                    var bairro = response.abrir_bairro;
                    var rua = response.abrir_rua;
                    var num = response.abrir_num;
                    var pref = response.abrir_pref;

                    var nome_sol = response.abrir_nome_sol;
                    var tel_sol = response.abrir_tel_sol;
                    var nome_mil = response.abrir_nome_mil;
                    var num_mil = response.abrir_num_mil;
                    var fun_mil = response.abrir_fun_mil;
                    var tipo = response.abrir_tipo;
                    var hor_aci = response.abrir_hor_aci;
                    var hor_che = response.abrir_hor_che;
                    var hor_ter = response.abrir_hor_ter;

                    var desc = response.abrir_desc;
                    var hist = response.abrir_hist;
                    var vtr_tipo = response.abrir_vtr_tipo;
                    var vtr_placa = response.abrir_vtr_placa;
                    var vtr_guar = response.abrir_vtr_guar;

                    //info local da ocorrencia
                    $('#identificador').val(suggestion);
                    $('#data_do_ocorrido').val(data);
                    $('#cidade_ocorrencia').val(cidade);
                    $('#bairro_ocorrencia').val(bairro);
                    $('#rua_ocorrencia').val(rua);
                    $('#num_ocorrencia').val(num);
                    $('#pref_ocorrencia').val(pref);

                    //info pessoa solicitante
                    $('#nome_solicitante').val(nome_sol);
                    $('#telefone_solicitante').val(tel_sol);

                    //info militar solicitante
                    $('#nome_militar').val(nome_mil);
                    $('#numfun_militar').val(num_mil);
                    $('#fun_militar').val(fun_mil);

                    //info sobre a ocorrencia
                    $('#tipo_de_ocorrencia').val(tipo);
                    $('#horario_acionamento').val(hor_aci);
                    $('#horario_chegada').val(hor_che);
                    $('#horario_termino').val(hor_ter);

                    $('#descrição_ocorrencia').val(desc);
                    $('#hist_ocorrencia').val(hist);

                    $('#tipo_de_viatura').val(vtr_tipo);
                    $('#placa_viatura').val(vtr_placa);
                    $('#quant_guar').val(vtr_guar);
                    //alert(data);
                    //alert(cidade);
                    //alert(bairro);
                    // Faça algo com a resposta recebida do servidor
                },
                error: function(xhr, status, error) {
                    // Ocorreu um erro na solicitação
                    alert(xhr.responseText);
                }
            });
        });
    </script>
@endpush

<!--
    


  -->
