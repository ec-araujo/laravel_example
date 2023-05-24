<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de Ocorrências</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>

    <script>
        var meses = [];
        var totais = [];
        var dados = {!! json_encode($dados) !!}

        dados.forEach(function(item) {
            meses.push(item.mes);
            totais.push(item.total);
        });

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Ocorrências por Mês',
                    data: totais,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
@foreach ($imfor as $dado)
<tr>
    <td>{{ $dado->id}}</td>
    <td>{{ $dado->tipo_de_ocorrencia }}</td>
</tr>
@endforeach