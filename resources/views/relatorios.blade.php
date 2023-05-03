<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <form action="/relatorios" method="get">
        <label for="data_do_ocorrido">Data do Ocorrido:</label>
        <input type="date" name="data_do_ocorrido" id="data_do_ocorrido" value="{{ request('data_do_ocorrido') }}">
    
        <label for="tipo_de_ocorrencia">Tipo de Ocorrência:</label>
        <input type="text" name="tipo_de_ocorrencia" id="tipo_de_ocorrencia" value="{{ request('tipo_de_ocorrencia') }}">
    
        <button type="submit">Filtrar</button>
    </form>
    <canvas id="pieChart"></canvas>
    <table>
        <thead>
            <tr>
                <th>Identificador</th>
                <th>Tipo de Ocorrência</th>
                <th>Data do Ocorrido</th>
                <th>Horário de Acionamento</th>
                <th>Horário de Chegada</th>
                <th>Horário de Término</th>
                <th>Cidade da Ocorrência</th>
                <th>Bairro da Ocorrência</th>
                <th>Endereço da Ocorrência</th>
                <th>Nome do Solicitante</th>
                <th>Telefone do Solicitante</th>
                <th>Descrição da Ocorrência</th>
                <th>Vítimas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relatorios as $relatorio)
                <tr>
                    <td>{{ $relatorio->identificador }}</td>
                    <td>{{ $relatorio->tipo_de_ocorrencia }}</td>
                    <td>{{ $relatorio->data_do_ocorrido }}</td>
                    <td>{{ $relatorio->horario_acionamento }}</td>
                    <td>{{ $relatorio->horario_chegada }}</td>
                    <td>{{ $relatorio->horario_termino }}</td>
                    <td>{{ $relatorio->cidade_ocorrencia }}</td>
                    <td>{{ $relatorio->bairro_ocorrencia }}</td>
                    <td>{{ $relatorio->endereco_ocorrencia }}</td>
                    <td>{{ $relatorio->nome_solicitante }}</td>
                    <td>{{ $relatorio->telefone_solicitante }}</td>
                    <td>{{ $relatorio->descricao_ocorrencia }}</td>
                    <td>{{ $relatorio->vitimas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
<script>
    const labels = [];
    const data = [];
    const backgroundColors = [];

    @foreach($relatorios as $relatorio)
        labels.push('{{ $relatorio->tipo_de_ocorrencia }}');
        data.push('{{ $relatorio->vitimas }}');
        backgroundColors.push(getRandomColor());
    @endforeach

    const ctx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: backgroundColors,
            }]
        },
        options: {
            responsive: false,
            width: 600,
            height: 600
            // aqui definimos um tamanho de 400px por 400px
        }
    });

    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>