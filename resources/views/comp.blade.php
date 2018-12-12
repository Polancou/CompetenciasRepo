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
    <form class="col s12" method="post" action="{{ route('addcomp') }}">
        {{ csrf_field() }}

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
                            <h6>Periodo: {{ $subject->periodo }}</h6>
                            <h6>Nombre de la asignatura: {{ $subject->nombre }}</h6>
                            <h6>Plan de estudios: {{ $subject->planestudios }}</h6>
                            <h6>Clave de la asignatura: {{ $subject->clave }}</h6>
                            <h6>Horas teoría - Horas práctica - Crédito: {{ $subject->horas }}</h6>

                            <h5>1. Caracterización de la asignatura:</h5>
                            <p>{{ $subject->caracterizacion }}</p>

                            <h5>2. Intención Didáctica:</h5>
                            <p>{{ $subject->intencion }}</p>
                        </div>


                            <div class="posts" id="posts" name="posts">
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
                                @unless (count($competitions))
                                    <p class="center-align">No hay registros.</p>
                                @endunless
                            </div>





                    </div>

                    <h5>Nueva Competencia</h5>
                    <div class="input-field">
                        <input type="number" id="nombre" name="nombre" value="">
                        <label for="nombre">Número</label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="descripcion" name="descripcion" value="">
                        <label for="descripcion">Descripción</label>
                    </div>
                    <a class="btn" onclick="save()" >Agregar Competencia</a>

                </div>



            </div>
        </div>


    </form>


@endsection
@section('scripts')
    <script>
        function save() {
            var nombre = document.getElementById('nombre').value;
            var descripcion = document.getElementById('descripcion').value;
            var asignatura = "{{ $subject->id }}";
            $.ajax({
                type: 'post',
                url: '{{route('addcomp')}}',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    nombre: nombre,
                    descripcion: descripcion,
                    asignatura: asignatura
                },
                success: function (response) {
                    document.getElementById('posts').innerHTML = response.html;
                    document.getElementById('nombre').value = "";
                    document.getElementById('descripcion').value = "";
                    //$('.tooltipped').tooltip({delay: 50});
                }
            });
        }
    </script>
@endsection