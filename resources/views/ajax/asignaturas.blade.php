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
    <form class="col s12" method="post" action="{{ route('first') }}">
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
                <a class="btn" href="{{ route('inicio') }}">Agregar nueva</a>
                <div style="margin: auto; ">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->nombre }}</td>
                                    <td><a href="{{ route('detalleasignatura',['id'=>$subject->id]) }}">Ver
                                            detalles</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </form>





@endsection