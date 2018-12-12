<table>
    <thead>
    <tr>
        <th>Temas y Subtemas para Desarrollar la Competencia Específica</th>
        <th>Actividades de Aprendizaje</th>
        <th>Actividades de Enseñanza</th>
        <th>Desarrollo de competencias genéricas</th>
        <th>Horas teórico-prácticas</th>
    </tr>
    </thead>
    <tbody>
    @foreach($topics as $topic)
        <tr>
            <td>{{ $topic->tema }}</td>
            <td>{{ $topic->activ_apren }}</td>
            <td>{{ $topic->activ_ene }}</td>
            <td>{{ $topic->desarrollo_com }}</td>
            <td>{{ $topic->horas }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@unless (count($topics))
    <p class="center-align">No hay registros.</p>
@endunless