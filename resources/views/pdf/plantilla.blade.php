<!doctype html>
<html lang="en">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Competencias</title>
</head>
<body>

<main>
    <div class="container">
        <div class="row">
            <div class="row col s12 m12">
                    <b>INSTRUMENTACIÓN DIDÁCTICA PARA LA FORMACIÓN Y DESARROLLO DE COMPETENCIAS</b><br>
                    <b>Periodo: {{ $subject->periodo }}</b><br>
                    <b>Nombre de la asignatura: {{ $subject->nombre }}</b><br>
                    <b>Plan de Estudios: {{ $subject->planestudios }}</b><br>
                    <b>Clave de la asignatura: {{ $subject->clave }}</b><br>
                    <b>Horas teoría - Horas práctica - Créditos: {{ $subject->horas }}</b><br>
                    <br>
                    <b>1. Caracterización de la asignatura:</b><br>
                    <p>{{ $subject->caracterizacion }}</p><br>
                    <b>2. Intención Didáctica</b><br>
                    <p>{{ $subject->intencion }}</p><br>

                    <b>3. Competencia de la asignatura</b><br>
                    <p>{{ $subject->competencia }}</p><br>

                    @foreach($competitions as $competition)
                        <h5>Competencia No. {{ $competition->nombre }}</h5><br>
                        <b>Descripción: </b><p>{{ $competition->descripcion }}</p><br>
                        <table class="bordered">
                            <thead>
                                <tr>
                                    <th>Temas y subtemas para desarrollar la competencia específica</th>
                                    <th>Actividades de aprendizaje</th>
                                    <th>Actividades de enseñanza</th>
                                    <th>Desarrollo de competencias genéricas</th>
                                    <th>Horas - teórico - práctica</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($competition->topics as $topic)
                                    <tr>
                                        <td>{{ $topic->tema }}</td>
                                        <td>{{ $topic->activ_apren }}</td>
                                        <td>{{ $topic->activ_ene }}</td>
                                        <td>{{ $topic->desarrollo_com }}</td>
                                        <td>{{ $topic->horas }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><br>
                        <table class="bordered">
                            <thead>
                                <tr>
                                    <th>Indicadores de alcance</th>
                                    <th>Valor del indicador</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($competition->indicators as $indicator)
                                    <tr>
                                        <td>{{ $indicator->indicador }}</td>
                                        <td>{{ $indicator->valor }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><br>
                        <b>Niveles de desempeño:</b><br>
                        @foreach($competition->performances as $performance)
                            <table class="bordered">
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
                            </table><br>
                        @endforeach
                        <b>Matriz de evaluación: </b><br>
                        <table class="bordered">
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
                                @foreach($competition->evaluations as $evaluation)
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
                        </table><br>

                        @foreach($competition->news as $new)
                        <b>Fuentes de información: </b><br>
                        <p>{{ $new->fuentes }}</p><br>
                        <b>Apoyos didácticos</b><br>
                        <p>{{ $new->apoyos }}</p>
                        <br>
                        <br>
                        <br>
                        @endforeach

                    @endforeach
            </div>
        </div>

    </div>
</main>
</body>
</html>