<h5>Niveles de desempeño</h5>
<table>
    <thead>
    <tr>
        <th>Desempeño</th>
        <th>Nivel de desempeño</th>
        <th>Indicadores de alcance</th>
        <th>Valoración numérica</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td rowspan="4">Competencia alcanzada</td>
        <td>Excelente</td>
        <td>{{ $performance->excelente }}</td>
        <td>{{ $performance->valorex }}</td>
    </tr>
    <tr>
        <td>Notable</td>
        <td>{{ $performance->notable }}</td>
        <td>{{ $performance->valornot }}</td>
    </tr>
    <tr>
        <td>Bueno</td>
        <td>{{ $performance->bueno }}</td>
        <td>{{ $performance->valorb }}</td>
    </tr>
    <tr>
        <td>Suficiente</td>
        <td>{{ $performance->suficiente }}</td>
        <td>{{ $performance->valorsuf }}</td>
    </tr>
    <tr>
        <td>Competencia no alcanzada</td>
        <td>Insuficiente</td>
        <td>{{ $performance->insuficiente }}</td>
        <td>{{ $performance->valorinsuf }}</td>
    </tr>
    </tbody>
</table>