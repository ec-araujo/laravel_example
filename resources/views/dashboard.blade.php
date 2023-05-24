@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Relator 1.0', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="container-fluid">
            <!--
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card ">
                                            <div class="card-header ">
                                                <h4 class="card-title">{{ __('Quantidade de Ocorrências - 2023') }}</h4>
                                                <p class="card-category">{{ __('Registro de Ocorrências') }}</p>
                                            </div>
                                            <div class="card-body ">
                                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                                                <div class="legend">
                                                    <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                                    <i class="fa fa-circle text-danger"></i> {{ __('Bounce') }}
                                                    <i class="fa fa-circle text-warning"></i> {{ __('Unsubscribe') }}
                                                </div>
                                                <hr>
                                                <div class="stats">
                                                    <i class="fa fa-clock-o"></i> {{ __('Campaign sent 2 days ago') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card ">
                                            <div class="card-header ">
                                                <h4 class="card-title">{{ __('Users Behavior') }}</h4>
                                                <p class="card-category">{{ __('24 Hours performance') }}</p>
                                            </div>
                                            <div class="card-body ">
                                                <div id="chartHours" class="ct-chart"></div>
                                            </div>
                                            <div class="card-footer ">
                                                <div class="legend">
                                                    <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                                    <i class="fa fa-circle text-danger"></i> {{ __('Click') }}
                                                    <i class="fa fa-circle text-warning"></i> {{ __('Click Second Time') }}
                                                </div>
                                                <hr>
                                                <div class="stats">
                                                    <i class="fa fa-history"></i> {{ __('Updated 3 minutes ago') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('2023 - Relatórios de Ocorrência') }}</h4>
                            <p class="card-category">{{ __('Ocorrências por Mês - gráfico linha') }}</p>
                        </div>
                        <div class="card-body ">

                            <canvas id="myChart" style="width: 300px; height: 100px;"></canvas>
                            <script>
                                var chartData = {!! json_encode($chartData) !!};

                                var ctx = document.getElementById('myChart').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        datasets: [{
                                            label: 'Ocorrências',
                                            data: chartData,
                                            borderColor: 'rgb(255, 99, 132)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            xAxes: [{
                                                type: 'category',
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Mês'
                                                }
                                            }],
                                            yAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Ocorrências'
                                                },
                                                ticks: {
                                                    beginAtZero: true,
                                                    stepSize: 1
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>







                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('2023 - Relatórios de Ocorrência') }}</h4>
                            <p class="card-category">{{ __('Quantidade por Tipo - gráfico barra') }}</p>
                        </div>
                        <div class="card-body">
                            <canvas id="myChartDuo" style="width: 300px; height: 200px;"></canvas>
                            <script>
                                var chartData = {!! json_encode($chartDouData) !!};

                                var ctx = document.getElementById('myChartDuo').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        datasets: [{
                                            label: 'Tipo de Ocorrências',
                                            data: chartData,
                                            borderColor: 'rgb(255, 99, 132)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            xAxes: [{
                                                type: 'category',
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Mês'
                                                }
                                            }],
                                            yAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Ocorrências'
                                                },
                                                ticks: {
                                                    beginAtZero: true,
                                                    stepSize: 1
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>

                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('2023 - Relatórios de Ocorrência') }}</h4>
                            <p class="card-category">{{ __('Ocorrências por Mês - gráfico donut') }}</p>
                        </div>
                        <div class="card-body ">

                            <canvas id="myChartDonut" style="width: 150px; height: 50px;"></canvas>
                            {!! json_encode($ocorrencias) !!}
                            <script>
                                var chartData = {!! json_encode($ocorrencias) !!};

                                var ctx = document.getElementById('myChartDonut').getContext('2d');

                                // Gerar dados aleatórios
                                var randomData = [];
                                var randomLabels = ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'];

                                for (var i = 0; i < randomLabels.length; i++) {
                                    randomData.push(Math.floor(Math.random() * 100));
                                }

                                var chart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        datasets: [{
                                            data: randomData,
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(153, 102, 255)'
                                                // Adicione mais cores de fundo conforme necessário
                                            ],
                                            borderWidth: 1
                                        }],
                                        labels: randomLabels
                                    },
                                    options: {
                                        responsive: true,
                                        legend: {
                                            display: true,
                                            position: 'bottom'
                                        }
                                    }
                                });
                            </script>





                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Relatórios') }}</h4>
                        </div>
                        <div class="card-body ">
                            <div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nº ID</th>
                                            <th scope="col">Tipo de Ocorrência</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Cidade</th>
                                            <th scope="col">Nome Solicitante</th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $dado)
                                            <tr style="text-align: center;">
                                                <td>{{ $dado->identificador }}</td>
                                                <td>{{ $dado->tipo_de_ocorrencia }}</td>
                                                <td>{{ $dado->data_do_ocorrido }}</td>
                                                <td>{{ $dado->cidade_ocorrencia }}</td>
                                                <td>{{ $dado->nome_solicitante }}</td>
                                                <td><button type="submit" class="btn btn-primary btn-xs">Abrir
                                                        Relatório</button></td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
