@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Relator 1.0', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
<h1>Valores da tabela Relatorios</h1>
    <textarea cols="50" rows="10" readonly id="valores"></textarea>
    
    <p>Clique no botão abaixo para ver os valores da tabela "relatorios".</p>
    <a href="/valores.php">Ver Valores</a>


<div class="content">
    <div class="container-fluid">
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
        <div class="row">
            <div class="col-md-12"> <!-- 12 muda o tamanho do quadro -->
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">{{ __('2017 Sales') }}</h4>
                        <p class="card-category">{{ __('All products including Taxes') }}</p>
                    </div>
                    <div class="card-body ">
                        <div id="chartActivity" class="ct-chart"></div>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> {{ __('Tesla Model S') }}
                            <i class="fa fa-circle text-danger"></i> {{ __('BMW 5 Series') }}
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