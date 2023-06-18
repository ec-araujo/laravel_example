<!-- _cidade.blade.php -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <td>{{ $produto->cidade_ocorrencia }}</td>
                <td>{{ $produto->id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
