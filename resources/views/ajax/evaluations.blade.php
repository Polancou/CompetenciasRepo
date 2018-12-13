<table>
    <thead>
        <tr>
            <th rowspan="2">Evidencia de aprendizaje</th>
            <th rowspan="2">%</th>
            <th colspan="6">Indicadores de Alcance</th>
            <th rowspan="2">Evaluación formativa de la competencia</th>
        </tr>
        <tr>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>D</th>
            <th>E</th>
            <th>F</th>
        </tr>
    </thead>
    <tbody>
    @foreach($evaluations as $evaluation)
        <tr>
            <td>{{ $evaluation->evidencia }}</td>
            <td>{{ $evaluation->porcentaje }}</td>
            <td>{{ $evaluation->a }}</td>
            <td>{{ $evaluation->b }}</td>
            <td>{{ $evaluation->c }}</td>
            <td>{{ $evaluation->d }}</td>
            <td>{{ $evaluation->e }}</td>
            <td>{{ $evaluation->f }}</td>
            <td>{{ $evaluation->evaluacion }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@unless (count($evaluations))
    <p class="center-align">No hay registros.</p>
@endunless