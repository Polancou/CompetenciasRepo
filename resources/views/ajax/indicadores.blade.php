<table>
    <thead>
    <tr>
        <th>Indicadores de Alcance</th>
        <th>Valor del Indicador</th>
    </tr>
    </thead>
    <tbody>
    @foreach($indicators as $indicator)
        <tr>
            <td>{{ $indicator->indicador }}</td>
            <td>{{ $indicator->valor }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@unless (count($indicators))
    <p class="center-align">No hay registros.</p>
@endunless