@extends('layouts.app', ['activePage' => 'relatorios', 'title' => 'Relator 1.0', 'navName' => 'Relatorio', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <h4 class="card-title">Relatório de Ocorrência</h4>

                        </div>
                        <div class="card-body">
                            <form name="formcentro" id="formcentro">
                                @csrf
                                <div class="row justify-content-between">
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Unidade</label>
                                            <select id="tipo_de_ocorrencia" name="tipo_de_ocorrencia"
                                                class="form-control">
                                                <option value="11">1º BBM</option>
                                                <option value="12">2º BBM</option>
                                                <option value="13">3º BBM</option>
                                                <option value="14">4º BBM</option>
                                                <option value="15">5º BBM</option>
                                                <option value="16">6º BBM</option>
                                                <option value="17">7º BBM</option>
                                                <option value="18">8º BBM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Data Início</label>
                                            <input type="date" class="form-control" id="data_inicio" name="data_inicio"
                                                value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Data Fim</label>
                                            <input type="date" class="form-control" id="data_fim" name="data_fim"
                                                value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>


                                    <div class="col-md-1">
                                        <div class="form-group">
                                            
                                            <button type="submit" class="btn btn-danger btn-fill">PDF</button>
                                        </div>

                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            
                                            <button type="submit" class="btn btn-warning btn-fill">CRV</button>
                                        </div>

                                    </div>
                                </div>

                                <div class="clearfix"></div>
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

            demo.initDashboardPageCharts();

            demo.showNotification();

        });

    </script>
@endpush
