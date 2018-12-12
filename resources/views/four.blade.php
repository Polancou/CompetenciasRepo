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
                            <button class="btn" type="submit" name="action">Agregar Competencia
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </form>





@endsection






