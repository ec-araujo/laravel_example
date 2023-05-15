@extends('layouts.app', ['activePage' => 'criar', 'title' => 'Relator 1.0', 'navName' => 'Criar', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 align="center">Relatório de Ocorrência</h1>
                        </div>
                        <div class="card-body">
                            <table class="td th">
                                <tr>
                                        <h4>Tipo de Ocorrência<span class="span">*</span></h4>
                                        <select class="btn-group select form">
                                            <option value=""></option>
                                            <option value="">Incendio Veicular</option>
                                            <option value="2">Incêndio Residencial</option>
                                            <option value="3">Incêndio Florestal/Vegetação</option>
                                            <option value="4">Busca e Salvamento</option>
                                        </select>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 class="h3">Identificação do Solicitante<span class="span">*</span></h3>
                                        <div class="title-block">
                                            <input type="text" name="name" value="{{ $usuario->name }}" readonly>
                                            <input type="text" name="email" value="{{ $usuario->email }}" readonly>
                                            <input type="text" name="role" value="{{ $usuario->role }}" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <h3 class="h3">Localização da Ocorrência<span class="span">*</span></h3>
                                        <div class="title-block">
                                            <input class="name" type="text" name="name" placeholder="Cidade" />
                                            <input class="name" type="text" name="name" placeholder="Bairro" />
                                            <input class="name" type="text" name="name" placeholder="Rua" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 class="h3">Acionamento<span class="span">*</span></h3>
                                        <input class="name" type="time" name="name" />
                                    </td>
                                    <td>
                                        <h3 class="h3">Chegada<span class="span">*</span></h3>
                                        <input class="name" type="time" name="name" />
                                    </td>
                                    <td>
                                        <h3 class="h3">Término<span class="span">*</span></h3>
                                        <input class="name" type="time" name="name" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                            <h3>Histórico da Ocorrência</h3>
                            <p class="small">HISTÓRICO/OBS: Deverão ser constados neste histórico, todos os dados
                                relevantes à ocorrência
                                tais como: Danos materiais
                                causados ao imóvel, presença do proprietário, recursos utilizados, local provável do inicio
                                do incêndio,
                                meios de prevenção
                                existentes no local (Extintores, iluminação, sinalização e saídas de emergência) e todos os
                                outros dados
                                importantes.</small><p>
                                <textarea rows="4" cols="100" ></textarea>
                                </td>
                             </tr>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="btn-block">
                                <a href="welcome.php" class="btn btn-primary">Salvar</a>
                                <a href="welcome.php" class="btn btn-primary">Voltar</a>
                                <a href="welcome.php" class="btn btn-primary">Gerar Pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        </form>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush

<!--
    


  -->
