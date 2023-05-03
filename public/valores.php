<!DOCTYPE html>
<html>
<head>
    <title>Valores da tabela Relatorios</title>
</head>
<body>
    <h1>Valores da tabela Relatorios</h1>
    <textarea cols="50" rows="10" readonly id="valores"></textarea>

    <script>
        var valores = <?php
            use Illuminate\Support\Facades\DB;
            $valores = DB::table('relatorios')->pluck('identificador')->toArray();
            echo json_encode($valores);
        ?>;
        
        var valoresTexto = valores.join('\n');
        document.getElementById('valores').textContent = valoresTexto;
    </script>
</body>
</html>
