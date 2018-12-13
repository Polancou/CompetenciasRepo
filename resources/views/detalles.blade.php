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


                        <div class="card performances" id="performances" name="performances">
                            @if(count($performance)>0)
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
                            @else
                                <form action="">
                                    <div class="row">
                                        <h5>Niveles de desempeño</h5>
                                        <div class="row">
                                            <h6>Excelente</h6>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="excelente" name="excelente">
                                                <label for="excelente">Indicador de alcance</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="valoracionex" name="valoracionex">
                                                <label for="valoracionex">Valoración numérica</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h6>Notable</h6>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="notable" name="notable">
                                                <label for="notable">Indicador de alcance</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="valoracionnot" name="valoracionnot">
                                                <label for="valoracionnot">Valoración numérica</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h6>Bueno</h6>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="bueno" name="bueno">
                                                <label for="bueno">Indicador de alcance</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="valoracionb" name="valoracionb">
                                                <label for="valoracionb">Valoración numérica</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h6>Suficiente</h6>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="suficiente" name="suficiente">
                                                <label for="suficiente">Indicador de alcance</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="valoracionsuf" name="valoracionsuf">
                                                <label for="valoracionsuf">Valoración numérica</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h6>Insuficiente</h6>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="insuficiente" name="insuficiente">
                                                <label for="insuficiente">Indicador de alcance</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input type="text" id="valoracioninsuf" name="valoracioninsuf">
                                                <label for="valoracioninsuf">Valoración numérica</label>
                                            </div>
                                        </div>
                                        <a class="btn" onclick="saveNiveles()" >Agregar Indicador</a>

                                    </div>
                                </form>
                            @endif
                          <div class="card">
                              <div class="evaluations" id="evaluations" name="evaluations">
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
                              </div>
                              <form action="">
                                  <h5>Matriz de Evaluación</h5>
                                  <div class="row">
                                      <h5>Nueva Evidencia</h5>
                                      <div class="row">
                                          <div class="input-field col s12 m6">
                                              <input type="text" id="evidencia" name="evidencia">
                                              <label for="evidencia">Evidencia de aprendiaje</label>
                                          </div>
                                          <div class="input-field col s12 m6">
                                              <input type="number" id="porcentaje" name="porcentaje">
                                              <label for="porcentaje">Porcentaje %</label>
                                          </div>
                                          <div class="row">
                                              <h6>Indicadores de alcance</h6>
                                              <div class="row">
                                                  <div class="input-field col s12 m6">
                                                      <input type="text" id="indiceA" name="indiceA">
                                                      <label for="indiceA">A</label>
                                                  </div>
                                                  <div class="input-field col s12 m6">
                                                      <input type="text" id="indiceB" name="indiceB">
                                                      <label for="indiceB">B</label>
                                                  </div>
                                                  <div class="input-field col s12 m6">
                                                      <input type="text" id="indiceC" name="indiceC">
                                                      <label for="indiceC">C</label>
                                                  </div>
                                                  <div class="input-field col s12 m6">
                                                      <input type="text" id="indiceD" name="indiceD">
                                                      <label for="indiceD">D</label>
                                                  </div>
                                                  <div class="input-field col s12 m6">
                                                      <input type="text" id="indiceE" name="indiceE">
                                                      <label for="indiceE">E</label>
                                                  </div>
                                                  <div class="input-field col s12 m6">
                                                      <input type="text" id="indiceF" name="indiceF">
                                                      <label for="indiceF">F</label>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="input-field col s12 m6">
                                              <input type="text" id="evaluacionf" name="evaluacionf">
                                              <label for="evaluacionf">Evaluación formativa de la
                                                  competencia</label>
                                          </div>
                                      </div>

                                      <a class="btn" onclick="saveEvaluacion()" >Agregar Evidencia</a>

                                  </div>
                              </form>
                          </div>

                            <div class="card">
                                @if(count($information)>0)
                                    <div class="col s12 m12">
                                        <div class="col s12 m6">
                                            <h5>Fuentes de información</h5>
                                            <p>{{ $information->fuentes }}</p>
                                        </div>
                                        <div class="col s12 m6">
                                            <h5>Apoyos didácticos</h5>
                                            <p>{{ $information->apoyos }}</p>
                                        </div>
                                    </div>
                                @else
                                <div class="row news" id="news" name="news">
                                    <div class="input-field col s12 m6">
                                        <textarea id="fuentes" name="fuentes"
                                                  class="materialize-textarea"></textarea>
                                        <label for="fuentes">Fuentes de información</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <textarea id="apoyos" name="apoyos" class="materialize-textarea"></textarea>
                                        <label for="apoyos">Apoyos didácticos</label>
                                    </div>
                                    <a class="btn" onclick="saveNews()" >Agregar Información</a>

                                </div>
                                @endif
                            </div>



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

        function saveNiveles() {
            var excelente = document.getElementById('excelente').value;
            var valoracionex = document.getElementById('valoracionex').value;
            var notable = document.getElementById('notable').value;
            var valoracionnot = document.getElementById('valoracionnot').value;
            var bueno = document.getElementById('bueno').value;
            var valoracionb = document.getElementById('valoracionb').value;
            var suficiente = document.getElementById('suficiente').value;
            var valoracionsuf = document.getElementById('valoracionsuf').value;
            var insuficiente = document.getElementById('insuficiente').value;
            var valoracioninsuf = document.getElementById('valoracioninsuf').value;
            var competencia = '{{ $competition->id }}';
            $.ajax({
                type: 'post',
                url: '{{route('addniveles')}}',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    excelente: excelente,
                    valoracionex: valoracionex,
                    notable: notable,
                    valoracionnot: valoracionnot,
                    bueno: bueno,
                    valoracionb: valoracionb,
                    suficiente: suficiente,
                    valoracionsuf: valoracionsuf,
                    insuficiente: insuficiente,
                    valoracioninsuf: valoracioninsuf,
                    competencia: competencia
                },
                success: function (response) {
                    document.getElementById('performances').innerHTML = response.html;
                    //$('.tooltipped').tooltip({delay: 50});
                    $(document).ready(function() {
                        Materialize.updateTextFields();
                    });
                }
            });
        }

        function saveEvaluacion() {
            var evaluacion = document.getElementById('evidencia').value;
            var porcentaje = document.getElementById('porcentaje').value;
            var indiceA = document.getElementById('indiceA').value;
            var indiceB = document.getElementById('indiceB').value;
            var indiceC = document.getElementById('indiceC').value;
            var indiceD = document.getElementById('indiceD').value;
            var indiceE = document.getElementById('indiceE').value;
            var indiceF = document.getElementById('indiceF').value;
            var evaluacionf = document.getElementById('evaluacionf').value;
            var competencia = '{{ $competition->id }}';
            $.ajax({
                type: 'post',
                url: '{{route('addevidencia')}}',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    evaluacion: evaluacion,
                    porcentaje: porcentaje,
                    indiceA: indiceA,
                    indiceB: indiceB,
                    indiceC: indiceC,
                    indiceD: indiceD,
                    indiceE: indiceE,
                    indiceF: indiceF,
                    evaluacionf: evaluacionf,
                    competencia: competencia
                },
                success: function (response) {
                    document.getElementById('evaluations').innerHTML = response.html;
                    document.getElementById('evaluacion').value = "";
                    document.getElementById('porcentaje').value = "";
                    document.getElementById('indiceA').value = "";
                    document.getElementById('indiceB').value = "";
                    document.getElementById('indiceC').value = "";
                    document.getElementById('indiceD').value = "";
                    document.getElementById('indiceE').value = "";
                    document.getElementById('indiceF').value = "";
                    document.getElementById('evaluacionf').value = "";
                    //$('.tooltipped').tooltip({delay: 50});
                    $(document).ready(function() {

                        Materialize.updateTextFields();
                    });
                }
            });
        }

        function saveNews() {
            var fuentes = document.getElementById('fuentes').value;
            var apoyos = document.getElementById('apoyos').value;
            var competencia = '{{ $competition->id }}';
            $.ajax({
                type: 'post',
                url: '{{route('addnews')}}',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    fuentes: fuentes,
                    apoyos: apoyos,
                    competencia: competencia
                },
                success: function (response) {
                    document.getElementById('news').innerHTML = response.html;
                    //$('.tooltipped').tooltip({delay: 50});
                    $(document).ready(function() {

                        Materialize.updateTextFields();
                    });
                }
            });
        }
    </script>
@endsection