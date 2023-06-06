@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Relator 1.0', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('2023 - Relatórios de Ocorrência') }}</h4>
                            <p class="card-category">{{ __('Ocorrências por Mês - gráfico linha') }}</p>
                        </div>
                        <div class="card-body ">

                            <canvas id="myChart" style="width: 300px; height: 100px;"></canvas>
                            <script>
                                var chartDataPassado = {!! json_encode($chartDataPassado) !!};
                                var chartDataAtual = {!! json_encode($chartDataAtual) !!};

                                var ctx = document.getElementById('myChart').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        datasets: [{
                                                label: '2022',
                                                data: chartDataPassado,
                                                borderColor: 'blue',
                                                borderWidth: 1
                                            }, {
                                                label: '2023',
                                                data: chartDataAtual,
                                                borderColor: 'red',
                                                borderWidth: 1
                                            }

                                        ]
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
                            <canvas id="myChartDuo" style="width: 300px; height: 100px;"></canvas>
                            <script>
                                var chartData = {!! json_encode($chartDouData) !!};

                                var ctx = document.getElementById('myChartDuo').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        datasets: [{
                                            label: 'Quantidade',
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
                <div class="col-md-5">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('2023 - Relatórios de Ocorrência') }}</h4>
                            <p class="card-category">{{ __('Ocorrências por Mês - gráfico donut') }}</p>
                            <div id="the-basics" class="form-group">
                                <input class="form-control typeahead" type="text" placeholder="Cidade">
                            </div>

                        </div>
                        <div class="card-body ">
                            <canvas id="myChartDonut" style="width: 250px; height: 100px;"></canvas>



                            <script>
                                // grafico doughnut
                                var ctx = document.getElementById('myChartDonut').getContext('2d');
                                var labels = {!! json_encode($dughDataLabel) !!};
                                var values = {!! json_encode($dughDataValue) !!};



                                // Dados para o gráfico
                                var data = {
                                    labels: labels,
                                    datasets: [{
                                        data: values,
                                        backgroundColor: generateRandomColors(7),
                                        hoverBackgroundColor: generateRandomColors(7), // Gerar cores randomizadas para hover
                                        borderWidth: 1,
                                        borderColor: '#ffffff',
                                    }]
                                };

                                var options = {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        position: 'bottom'
                                    }
                                };

                                // Criação do gráfico de rosca
                                var chart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: data,
                                    options: options
                                });

                                function generateRandomColors(quantity) {
                                    var colors = [];
                                    for (var i = 0; i < quantity; i++) {
                                        var color = getRandomColor();
                                        colors.push(color);
                                    }
                                    return colors;
                                }

                                function getRandomColor() {
                                    var letters = '0123456789ABCDEF';
                                    var color = '#';
                                    for (var i = 0; i < 6; i++) {
                                        color += letters[Math.floor(Math.random() * 16)];
                                    }
                                    return color;
                                }
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
                        <div class="card-body " style="text-align: center">
                            <div class="pagination-container">
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
                                                <td>
                                                    <button type="submit" class="btn btn-primary btn-xs abrir_relatorio"
                                                        data-identificador="{{ $dado->identificador }}">Abrir
                                                        Relatório</button>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $roles->links('pagination::bootstrap-4') }}
                            </div>

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


        //$('#meuBotao').click(function() {
        //   $.ajax({
        //     url: '/exemplo',
        //   type: 'GET',
        //   success: function(response) {
        //       alert('Mensagem: ' + response.mensagem);
        //     },
        //  error: function(xhr, status, error) {
        //      console.error(xhr.responseText);
        //       }
        //   });
        //});



        //   $('#the-basics .typeahead').on('typeahead:select', function(e, suggestion) {
        //     var newData = [10, 20, 30]; // Novos valores dos dados do gráfico
        //   var newLabels = ["Red", "Blue", "Yellow"];
        // Acessar a instância do gráfico
        //  const chart = Chart.getChart("myChartDonut");

        // Verificar se o gráfico existe
        //  if (chart) {
        // Atualizar os valores dos dados do gráfico
        //     chart.data.datasets[0].data = newData;
        //     chart.data.labels = newLabels;
        // Atualizar o gráfico
        //    chart.update();
        // }
        //});




        $('#the-basics .typeahead').on('typeahead:select', function(e, suggestion) {
            const chart = Chart.getChart("myChartDonut");

            // Atualizar o valor do input
            if (chart) {
                var novoValor = "Deu certo";
                alert(novoValor)
                // Fazer uma requisição AJAX para buscar dados no banco de dados
                /*                 $.ajax({
                                    type: "GET",
                                    url: {{ route('abrir') }},
                                    data: {
                                        cidade: suggestion
                                    },
                                    dataType: 'json',
                                    success: function(data) {
                                        // Atualizar os valores dos dados e rótulos com base nos dados do banco de dados
                                        //var newData = data.valores;
                                        //var newLabels = data.rótulos;
                                        $('#meuInput').val("suggestion");

                                        //chart.data.datasets[0].data = newData;
                                        //chart.data.labels = newLabels;
                                        //chart.update();


                                    }
                                }); */
            }

        });

        $('.abrir_relatorio').click(function() {
            var identificador = $(this).data('identificador');
            window.location.href = '/abrir/' + identificador;
/*             $.ajax({
                url: '/abrir/' + identificador, // Substitua pela URL da outra view
                type: 'GET',
                data: identificador,
                //processData: false,
                //contentType: false,
                success: function(response) {
                    // A solicitação foi bem-sucedida
                    
                    //alert(identificador); // Faça algo com a resposta recebida do servidor
                },
                error: function(xhr, status, error) {
                    // Ocorreu um erro na solicitação
                    alert(xhr.responseText);
                }
            }); */
            //alert(identificador);
            // window.location.href = '/abrir/identificador=' + encodeURIComponent(identificador);
            
            // Redirecionar para a página desejada com o identificador como parâmetro de URL

        });

        /*         function abrirRelatorio() {
                    $.ajax({
                        url: 'abrir', // URL of the view or route you want to navigate to
                        type: 'GET',
                        success: function(response) {
                            // Redirect to the desired view
                            window.location.href = '/abrir';
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } */
    </script>
@endpush
