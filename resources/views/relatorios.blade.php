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

        </tbody>
    </table>
</body>
</html>

