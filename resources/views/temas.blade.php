@extends('template')
@section('body')
    <form class="col s12" method="post" action="">
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
                @if(session()->has('message'))
                    <div class="red darken-4 white-text col s12 m12 center-align" style="border-radius: 25px">
                        <h5>{{ session()->get('message') }}</h5>
                    </div><br>
                @endif
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


                    </div>

                </div>



            </div>
        </div>
    </form>





@endsection






