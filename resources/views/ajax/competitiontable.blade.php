<table>
    <thead>
    <tr>
        <th>Número</th>
        <th>Descripción</th>
        <th>Modificar</th>
    </tr>
    </thead>

    <tbody>
    @foreach($competitions as $competition)
        <tr>
            <td>{{ $competition->nombre }}</td>
            <td>{{ $competition->descripcion }}</td>
            <td>
                <a href="{{ route('details',['id'=>$competition->id]) }}">Ver detalles</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>