@extends('template')
@section('body')
    <!-- Page Content
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="mt-5">INSTRUMENTACIÓN DIDÁCTICA PARA LA FORMACIÓN Y DESARROLLO DE COMPETENCIA</h4>
            </div>
        </div>
    </div>-->

        <div class="row">
            <div class="col s12 m12">
                <div class="row center ">
                    <div class="row col s12 m9">
                        <blockquote>
                            <h4 class="left-align ">INSTRUMENTACIÓN DIDÁCTICA PARA LA FORMACIÓN Y DESARROLLO DE
                                COMPETENCIAS</h4>
                        </blockquote>
                    </div>
                </div>
                <div style="margin: auto; ">

                    <div class="card col s12 m12" >

                        <div class="card col s12 m12">
                            <h6>Periodo: {{ $competition->subject->periodo }}</h6>
                            <h6>Nombre de la asignatura: {{ $competition->subject->nombre }}</h6>
                            <h6>Plan de estudios: {{ $competition->subject->planestudios }}</h6>
                            <h6>Clave de la asignatura: {{ $competition->subject->clave }}</h6>
                            <h6>Horas teoría - Horas práctica - Crédito: {{ $competition->subject->horas }}</h6>

                            <h5>1. Caracterización de la asignatura:</h5>
                            <p>{{ $competition->subject->caracterizacion }}</p>

                            <h5>2. Intención Didáctica:</h5>
                            <p>{{ $competition->subject->intencion }}</p>
                        </div>

                        <h5>Competencia {{ $competition->nombre }}</h5>
                        <h6>Descripción: {{ $competition->descripcion }}</h6>
                        <div class="card">

                            <div class="topics" id="topics" name="topics">
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
                            </div>


                            <div class="row">
                                <h5>Nuevo tema</h5>
                                <div class="input-field col s12 m12">
                                    <textarea id="tema" name="tema" class="materialize-textarea"></textarea>
                                    <label for="tema">Temas y Subtemas para desarrollar la competencia específica</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <textarea id="activ_apren" name="activ_apren" class="materialize-textarea"></textarea>
                                    <label for="activ_apren">Actividades de Aprendizaje</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <textarea id="activ_ene" name="activ_ene" class="materialize-textarea"></textarea>
                                    <label for="activ_ene">Actividades de Enseñanza</label>
                                </div>
                                <div class="input-field col s12 m8">
                                    <textarea id="desarrollo_com" name="desarrollo_com" class="materialize-textarea"></textarea>
                                    <label for="desarrollo_com">Desarrollo de competencias genéricas</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input type="text" id="horas" name="horas">
                                    <label for="horas">Horas Teórico-Práctica</label>
                                </div>
                            </div>
                            <a class="btn" onclick="saveTema()" >Agregar Tema</a>

                        </div>

                        <br>

                        <div class="card">
                            <div class="indicators" id="indicators" name="indicators">
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
                            </div>

                            <form action="">
                                <div class="row">
                                    <h5>Nuevo Indicador</h5>
                                    <div class="input-field col s12 m6">
                                        <textarea id="indicador" name="indicador"
                                                  class="materialize-textarea"></textarea>
                                        <label for="indicador">Indicador de alcance</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <textarea id="valor" name="valor" class="materialize-textarea"></textarea>
                                        <label for="valor">Valor de indicador</label>
                                    </div>
                                    <a class="btn" onclick="saveInicador()" >Agregar Indicador</a>

                                </div>
                            </form>
                        </div>


                        <div class="card">
                            <div class="indicators" id="indicators" name="indicators">
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
                            </div>

                            <form action="">
                                <div class="row">
                                    <h5>Niveles de desempeño</h5>
                                    <div class="input-field col s12 m6">
                                        <textarea id="indicador" name="indicador"
                                                  class="materialize-textarea"></textarea>
                                        <label for="indicador">Indicador de alcance</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <textarea id="valor" name="valor" class="materialize-textarea"></textarea>
                                        <label for="valor">Valor de indicador</label>
                                    </div>
                                    <a class="btn" onclick="saveInicador()" >Agregar Indicador</a>

                                </div>
                            </form>
                        </div>
                    </div>
                    <a class="btn red" href="{{ route('backcomp',['id'=>$competition->subject->id]) }}">Volver</a>

                </div>



            </div>
        </div>

@endsection
@section('scripts')
    <script>
        function saveTema() {
            var tema = document.getElementById('tema').value;
            var activ_apren = document.getElementById('activ_apren').value;
            var activ_ene = document.getElementById('activ_ene').value;
            var desarrollo_com = document.getElementById('desarrollo_com').value;
            var horas = document.getElementById('horas').value;
            var competencia = '{{ $competition->id }}';
            $.ajax({
                type: 'post',
                url: '{{route('addtema')}}',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    tema: tema,
                    activ_apren: activ_apren,
                    activ_ene: activ_ene,
                    desarrollo_com: desarrollo_com,
                    horas: horas,
                    competencia: competencia
                },
                success: function (response) {
                    document.getElementById('topics').innerHTML = response.html;
                    document.getElementById('tema').value = "";
                    document.getElementById('activ_apren').value = "";
                    document.getElementById('activ_ene').value = "";
                    document.getElementById('desarrollo_com').value = "";
                    document.getElementById('horas').value = "";
                    //$('.tooltipped').tooltip({delay: 50});
                }
            });
        }

        function saveInicador() {
            var indicador = document.getElementById('indicador').value;
            var valor = document.getElementById('valor').value;
            var competencia = '{{ $competition->id }}';
            $.ajax({
                type: 'post',
                url: '{{route('addindicador')}}',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    indicador: indicador,
                    valor: valor,
                    competencia: competencia
                },
                success: function (response) {
                    document.getElementById('indicators').innerHTML = response.html;
                    document.getElementById('indicador').value = "";
                    document.getElementById('valor').value = "";
                    //$('.tooltipped').tooltip({delay: 50});
                }
            });
        }
    </script>
@endsection